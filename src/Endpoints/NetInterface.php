<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface NetInterface
{
    public function currentPlmn(): ResponseInterface;

    public function netMode(): ResponseInterface;

    public function setNetMode(string $lteband, string $networkband, string $networkmode): ResponseInterface;

    public function network(): ResponseInterface;

    public function register(): ResponseInterface;

    /**
     * Sets network selection
     *
     * @param string $mode "1": manual network selection, "0": auto
     * @param string $plmn Plmn code ("Numeric" value returned by net_mode_list()), "" for auto
     * @param string $rat "0": "2G", "2": "3G", "7": "4G" ("Rat" value returned by net_mode_list()), "" for auto
     */
    public function setRegister(string $mode, string $plmn, string $rat): ResponseInterface;

    public function netModeList(): ResponseInterface;

    /**
     * DoS
     */
    public function plmnList(): ResponseInterface;

    public function netFeatureSwitch(): ResponseInterface;

    public function cellInfo(): ResponseInterface;

    public function cspsState(): ResponseInterface;
}
