<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Security extends AbstractEndpoint implements SecurityInterface
{
    public function bridgemode(): ResponseInterface
    {
        return $this->connection->get('security/bridgemode');
    }

    public function getFirewallSwitch(): ResponseInterface
    {
        return $this->connection->get('security/firewall-switch');
    }

    public function setFirewallSwitch(
        bool $firewall = true,
        bool $ipFilter = false,
        bool $wanPingFilter = true,
        bool $urlFilter = false,
        bool $macFilter = false
    ): ResponseInterface {
        return $this->connection->post('security/firewall-switch', [
            'FirewallMainSwitch'        => $firewall ? 1 : 0,
            'FirewallIPFilterSwitch'    => $ipFilter ? 1 : 0,
            'FirewallWanPortPingSwitch' => $wanPingFilter ? 1 : 0,
            'firewallurlfilterswitch'   => $urlFilter ? 1 : 0,
            'firewallmacfilterswitch'   => $macFilter ? 1 : 0,
        ]);
    }

    public function macFilter(): ResponseInterface
    {
        return $this->connection->get('security/mac-filter');
    }

    public function lanIpFilter(): ResponseInterface
    {
        return $this->connection->get('security/lan-ip-filter');
    }

    public function virtualServers(): ResponseInterface
    {
        return $this->connection->get('security/virtual-servers');
    }

    public function urlFilter(): ResponseInterface
    {
        return $this->connection->get('security/url-filter');
    }

    public function upnp(): ResponseInterface
    {
        return $this->connection->get('security/upnp');
    }

    public function setUpnp(bool $enabled): ResponseInterface
    {
        return $this->connection->post('security/upnp', [
            'UpnpStatus' => $enabled ? 1 : 0,
        ]);
    }

    public function dmz(): ResponseInterface
    {
        return $this->connection->get('security/dmz');
    }

    public function setDmz(bool $enabled, string $ipAddress): ResponseInterface
    {
        return $this->connection->post('security/dmz', [
            'DmzStatus'    => $enabled ? 1 : 0,
            'DmzIPAddress' => $ipAddress,
        ]);
    }

    public function sip(): ResponseInterface
    {
        return $this->connection->get('security/sip');
    }

    public function setSip(bool $enabled, int $port): ResponseInterface
    {
        return $this->connection->post('security/sip', [
            'SipStatus' => $enabled ? 1 : 0,
            'SipPort'   => $port,
        ]);
    }

    public function featureSwitch(): ResponseInterface
    {
        return $this->connection->get('security/feature-switch');
    }

    public function nat(): ResponseInterface
    {
        return $this->connection->get('security/nat');
    }

    public function specialApplications(): ResponseInterface
    {
        return $this->connection->get('security/special-applications');
    }

    public function whiteLanIpFilter(): ResponseInterface
    {
        return $this->connection->get('security/white-lan-ip-filter');
    }

    public function whiteUrlFilter(): ResponseInterface
    {
        return $this->connection->get('security/white-url-filter');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage, probably not implemented by Huawei
     */
    public function acls(): ResponseInterface
    {
        return $this->connection->get('security/acls');
    }
}
