<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class MLog extends AbstractEndpoint implements MLogInterface
{
    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function mobileLogger(): ResponseInterface
    {
        return $this->connection->get('mlog/mobile-logger');
    }
}
