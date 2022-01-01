<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Lan extends AbstractEndpoint implements LanInterface
{
    public function hostInfo(): ResponseInterface
    {
        return $this->connection->get('lan/HostInfo');
    }
}
