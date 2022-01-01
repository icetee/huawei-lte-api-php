<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Log extends AbstractEndpoint implements LogInterface
{
    public function loginfo(): ResponseInterface
    {
        return $this->connection->get('log/loginfo');
    }
}
