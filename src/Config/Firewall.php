<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Firewall extends AbstractEndpoint implements FirewallInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('firewall/config.xml', [], 'config');
    }
}
