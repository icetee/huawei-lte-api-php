<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Ipv6 extends AbstractEndpoint implements Ipv6Interface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('ipv6/config.xml', [], 'config');
    }
}
