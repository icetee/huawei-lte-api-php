<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Vpn extends AbstractEndpoint implements VpnInterface
{
    public function featureSwitch(): ResponseInterface
    {
        return $this->connection->get('vpn/feature-switch');
    }

    public function brList(): ResponseInterface
    {
        return $this->connection->get('vpn/br_list');
    }

    public function ipsecSettings(): ResponseInterface
    {
        return $this->connection->get('vpn/ipsec_settings');
    }

    public function l2tpSettings(): ResponseInterface
    {
        return $this->connection->get('vpn/l2tp_settings');
    }

    public function pptpSettings(): ResponseInterface
    {
        return $this->connection->get('vpn/pptp_settings');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function status(): ResponseInterface
    {
        return $this->connection->get('vpn/status');
    }
}
