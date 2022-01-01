<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface MLogInterface
{
    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function mobileLogger(): ResponseInterface;
}
