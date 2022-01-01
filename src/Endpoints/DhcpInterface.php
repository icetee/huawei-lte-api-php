<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface DhcpInterface
{
    public function settings(): ResponseInterface;

    public function featureSwitch(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function dhcpHostInfo(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function staticAddrInfo(): ResponseInterface;
}
