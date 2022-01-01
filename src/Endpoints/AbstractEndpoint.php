<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\Connection;

abstract class AbstractEndpoint
{
    public function __construct(
        protected Connection $connection
    ) {
        $this->connection = $connection;
    }
}
