<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Wifi extends AbstractEndpoint implements WifiInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('wifi/config.xml', [], 'config');
    }

    public function configure(): ResponseInterface
    {
        return $this->connection->get('wifi/configure.xml', [], 'config');
    }

    public function countryChannel(): ResponseInterface
    {
        return $this->connection->get('wifi/countryChannel.xml', [], 'config');
    }

    public function channelAutoMatchHardware(): ResponseInterface
    {
        return $this->connection->get('wifi/channelAutoMatchHardware.xml', [], 'config');
    }
}
