<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class DeviceInformation extends AbstractEndpoint implements DeviceInformationInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('deviceinformation/config.xml', [], 'config');
    }
}
