<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Syslog extends AbstractEndpoint implements SyslogInterface
{
    public function querylog(): ResponseInterface
    {
        return $this->connection->get('syslog/querylog');
    }

    public function clear(): ResponseInterface
    {
        return $this->connection->post('syslog/processlog', [
            'command' => 'clear',
        ]);
    }
}
