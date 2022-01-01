<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class GlobalConfig extends AbstractEndpoint implements GlobalConfigInterface
{
    public function moduleSwitch(): ResponseInterface
    {
        return $this->connection->get('global/module-switch');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function storageGetItem(): ResponseInterface
    {
        return $this->connection->get('global/storage-getitem');
    }
}
