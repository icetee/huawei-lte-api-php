<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Dhcp extends AbstractEndpoint implements DhcpInterface
{
    public function settings(): ResponseInterface
    {
        return $this->connection->get('dhcp/settings');
    }

    public function featureSwitch(): ResponseInterface
    {
        return $this->connection->get('dhcp/feature-switch');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function dhcpHostInfo(): ResponseInterface
    {
        return $this->connection->get('dhcp/dhcp-host-info');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function staticAddrInfo(): ResponseInterface
    {
        return $this->connection->get('dhcp/static-addr-info');
    }
}
