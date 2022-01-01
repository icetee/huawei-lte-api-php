<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Device extends AbstractEndpoint implements DeviceInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('device/config.xml', [], 'config');
    }
}
