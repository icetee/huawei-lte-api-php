<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface UserInterface
{
    public function login(bool $forceNewLogin = false): bool;

    public function stateLogin(): ResponseInterface;

    public function logout(): ResponseInterface;

    public function remind(): ResponseInterface;

    public function password(): ResponseInterface;

    public function pwd(): ResponseInterface;

    public function setRemind(string $remindState): ResponseInterface;

    public function authenticationLogin(): ResponseInterface;

    public function challengeLogin(): ResponseInterface;

    public function hilinkLogin(): ResponseInterface;

    public function historyLogin(): ResponseInterface;

    public function heartbeat(): ResponseInterface;

    public function webFeatureSwitch(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function inputEvent(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function screenState(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function session(): ResponseInterface;
}
