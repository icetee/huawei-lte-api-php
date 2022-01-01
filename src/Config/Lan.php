<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Lan extends AbstractEndpoint implements LanInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('lan/config.xml', [], 'config');
    }
}
