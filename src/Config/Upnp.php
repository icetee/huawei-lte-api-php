<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Upnp extends AbstractEndpoint implements UpnpInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('upnp/config.xml', [], 'config');
    }
}
