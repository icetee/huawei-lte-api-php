<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Network extends AbstractEndpoint implements NetworkInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('network/config.xml', [], 'config');
    }

    public function netMode(): ResponseInterface
    {
        return $this->connection->get('network/net-mode.xml', [], 'config');
    }

    public function networkmode(): ResponseInterface
    {
        return $this->connection->get('network/networkmode.xml', [], 'config');
    }

    public function networkbandNull(): ResponseInterface
    {
        return $this->connection->get('network/networkband_null.xml', [], 'config');
    }

    public function setOnly4g(): ResponseInterface
    {
        return $this->connection->get('network/setOnly4g.xml', [], 'config');
    }
}
