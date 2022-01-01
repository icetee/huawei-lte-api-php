<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\Enums\ApiResponseEnum;
use Icetee\HuaweiAPI\Enums\LoginStateEnum;
use Icetee\HuaweiAPI\Enums\PasswordTypeEnum;
use Icetee\HuaweiAPI\ResponseInterface;

use function base64_encode;
use function hash;
use function implode;
use function mb_check_encoding;
use function mb_convert_encoding;

final class User extends AbstractEndpoint implements UserInterface
{
    private PasswordTypeEnum $passwordType = PasswordTypeEnum::BASE_64;

    public function login(bool $forceNewLogin = false): bool
    {
        $stateLogin = $this->stateLogin();

        if (! $stateLogin) {
            return true;
        }

        $state = (int) $stateLogin->getXmlContent()->State->__toString();

        if (
            LoginStateEnum::tryFrom($state) === LoginStateEnum::LOGGED_IN && ! $forceNewLogin
        ) {
            return true;
        }

        $this->setPasswordType($stateLogin);

        return $this->attemptLogin();
    }

    public function stateLogin(): ResponseInterface
    {
        return $this->connection->get('user/state-login');
    }

    public function logout(): ResponseInterface
    {
        return $this->connection->get('user/logout', ['Logout' => 1]);
    }

    public function remind(): ResponseInterface
    {
        return $this->connection->get('user/remind');
    }

    public function password(): ResponseInterface
    {
        return $this->connection->get('user/password');
    }

    public function pwd(): ResponseInterface
    {
        return $this->connection->get('user/pwd');
    }

    public function setRemind(string $remindState): ResponseInterface
    {
        return $this->connection->post('user/remind', [
            'remindstate' => $remindState,
        ]);
    }

    public function authenticationLogin(): ResponseInterface
    {
        return $this->connection->get('user/authentication_login');
    }

    public function challengeLogin(): ResponseInterface
    {
        return $this->connection->get('user/challenge_login');
    }

    public function setChallengeLogin(string $username, string $firstnonce, int $mode): ResponseInterface
    {
        return $this->connection->post('user/challenge_login', [
            'username'   => $username,
            'firstnonce' => $firstnonce,
            'mode'       => (string) $mode,
        ]);
    }

    public function hilinkLogin(): ResponseInterface
    {
        return $this->connection->get('user/hilink_login');
    }

    public function historyLogin(): ResponseInterface
    {
        return $this->connection->get('user/history-login');
    }

    public function heartbeat(): ResponseInterface
    {
        return $this->connection->get('user/heartbeat');
    }

    public function webFeatureSwitch(): ResponseInterface
    {
        return $this->connection->get('user/web-feature-switch');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function inputEvent(): ResponseInterface
    {
        return $this->connection->get('user/input_event');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function screenState(): ResponseInterface
    {
        return $this->connection->get('user/screen_state');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function session(): ResponseInterface
    {
        return $this->connection->get('user/session');
    }

    private function setPasswordType(ResponseInterface $stateLogin): void
    {
        $passwordType = PasswordTypeEnum::tryFrom((int) $stateLogin->getXmlContent()->password_type->__toString());

        if ($passwordType !== null) {
            $this->passwordType = $passwordType;
        }
    }

    private function getEncryptedPassword(): string
    {
        $password = '';

        $options = $this->connection->getOptions();

        if ($this->passwordType === PasswordTypeEnum::SHA256) {
            $pwd = $options->getPassword();

            if (! mb_check_encoding($pwd, 'UTF-8')) {
                $pwd = mb_convert_encoding($pwd, 'UTF-8');
            }

            $concentrated = [
                $options->getUsername(),
                base64_encode(hash('sha256', $pwd)),
                $this->connection->getRequestVerificationTokens()[0],
            ];

            $password = base64_encode(hash('sha256', implode('', $concentrated)));
        } else {
            $password = base64_encode($options->getPassword());
        }

        return $password;
    }

    private function attemptLogin(): bool
    {
        $options = $this->connection->getOptions();

        $response = $this->connection->post('user/login', [
            'Username'      => $options->getUsername(),
            'Password'      => $this->getEncryptedPassword(),
            'password_type' => $this->passwordType->key(),
        ], true);

        return $response !== null && $response->getXmlContent()->__toString() === ApiResponseEnum::OK;
    }
}
