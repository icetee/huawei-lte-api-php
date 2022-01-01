<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface VpnInterface
{
    public function featureswitch(): ResponseInterface;

    public function brList(): ResponseInterface;

    public function ipsecSettings(): ResponseInterface;

    public function l2tpSettings(): ResponseInterface;

    public function pptpSettings(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function status(): ResponseInterface;
}
