<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class DialUp extends AbstractEndpoint implements DialUpInterface
{
    /**
     * Get current LTE modem toggle state
     */
    public function mobileDataswitch(): ResponseInterface
    {
        return $this->connection->get('dialup/mobile-dataswitch');
    }

    public function connection(): ResponseInterface
    {
        return $this->connection->get('dialup/connection');
    }

    public function dialupFeatureSwitch(): ResponseInterface
    {
        return $this->connection->get('dialup/dialup-feature-switch');
    }

    public function profiles(): ResponseInterface
    {
        return $this->connection->get('dialup/profiles');
    }

    public function autoApn(): ResponseInterface
    {
        return $this->connection->get('dialup/auto-apn');
    }

    public function dial(): ResponseInterface
    {
        return $this->connection->post('dialup/dial', [
            'Action' => 1,
        ]);
    }

    /**
     * Toggle LTE modem state
     *
     * @param int $dataswitch: 0 to disable LTE modem, 1 to enable LTE modem
     */
    public function setMobileDataswitch(int $dataswitch = 0): ResponseInterface
    {
        return $this->connection->post('dialup/mobile-dataswitch', [
            'dataswitch' => $dataswitch,
        ]);
    }
}
