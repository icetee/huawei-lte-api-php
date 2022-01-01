<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class DialUp extends AbstractEndpoint implements DialUpInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('dialup/config.xml', [], 'config');
    }

    public function connectmode(): ResponseInterface
    {
        return $this->connection->get('dialup/connectmode.xml', [], 'config');
    }

    public function profileswitch(): ResponseInterface
    {
        return $this->connection->get('dialup/profileswitch.xml', [], 'config');
    }

    public function lmtAutoModeDisconnect(): ResponseInterface
    {
        return $this->connection->get('dialup/lmt_auto_mode_disconnect.xml', [], 'config');
    }
}
