<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Net extends AbstractEndpoint implements NetInterface
{
    public function currentPlmn(): ResponseInterface
    {
        return $this->connection->get('net/current-plmn');
    }

    public function netMode(): ResponseInterface
    {
        return $this->connection->get('net/net-mode');
    }

    public function setNetMode(string $lteband, string $networkband, string $networkmode): ResponseInterface
    {
        return $this->connection->post('net/net-mode', [
            'NetworkMode' => $networkmode,
            'NetworkBand' => $networkband,
            'LTEBand'     => $lteband,
        ]);
    }

    public function network(): ResponseInterface
    {
        return $this->connection->get('net/network');
    }

    public function register(): ResponseInterface
    {
        return $this->connection->get('net/register');
    }

    /**
     * Sets network selection
     *
     * @param string $mode "1": manual network selection, "0": auto
     * @param string $plmn Plmn code ("Numeric" value returned by net_mode_list()), "" for auto
     * @param string $rat "0": "2G", "2": "3G", "7": "4G" ("Rat" value returned by net_mode_list()), "" for auto
     */
    public function setRegister(string $mode, string $plmn, string $rat): ResponseInterface
    {
        return $this->connection->post('net/register', [
            'Mode' => $mode,
            'Plmn' => $plmn,
            'Rat'  => $rat,
        ]);
    }

    public function netModeList(): ResponseInterface
    {
        return $this->connection->get('net/net-mode-list');
    }

    /**
     * DoS
     */
    public function plmnList(): ResponseInterface
    {
        return $this->connection->get('net/plmn-list');
    }

    public function netFeatureSwitch(): ResponseInterface
    {
        return $this->connection->get('net/net-feature-switch');
    }

    public function cellInfo(): ResponseInterface
    {
        return $this->connection->get('net/cell-info');
    }

    public function cspsState(): ResponseInterface
    {
        return $this->connection->get('net/csps_state');
    }
}
