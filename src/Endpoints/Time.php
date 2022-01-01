<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Time extends AbstractEndpoint implements TimeInterface
{
    public function timeout(): ResponseInterface
    {
        return $this->connection->get('time/timeout');
    }
}
