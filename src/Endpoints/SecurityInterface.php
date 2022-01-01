<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface SecurityInterface
{
    public function bridgemode(): ResponseInterface;

    public function getFirewallSwitch(): ResponseInterface;

    public function setFirewallSwitch(
        bool $firewall = true,
        bool $ipFilter = false,
        bool $wanPingFilter = true,
        bool $urlFilter = false,
        bool $macFilter = false
    ): ResponseInterface;

    public function macFilter(): ResponseInterface;

    public function lanIpFilter(): ResponseInterface;

    public function virtualServers(): ResponseInterface;

    public function urlFilter(): ResponseInterface;

    public function upnp(): ResponseInterface;

    public function setUpnp(bool $enabled): ResponseInterface;

    public function dmz(): ResponseInterface;

    public function setDmz(bool $enabled, string $ipAddress): ResponseInterface;

    public function sip(): ResponseInterface;

    public function setSip(bool $enabled, int $port): ResponseInterface;

    public function featureSwitch(): ResponseInterface;

    public function nat(): ResponseInterface;

    public function specialApplications(): ResponseInterface;

    public function whiteLanIpFilter(): ResponseInterface;

    public function whiteUrlFilter(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage, probably not implemented by Huawei
     */
    public function acls(): ResponseInterface;
}
