<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class SNtp extends AbstractEndpoint implements SNtpInterface
{
    public function getSettings(): ResponseInterface
    {
        return $this->connection->get('sntp/settings');
    }

    public function sntpswitch(): ResponseInterface
    {
        return $this->connection->get('sntp/sntpswitch');
    }

    public function serverinfo(): ResponseInterface
    {
        return $this->connection->get('sntp/serverinfo');
    }

    public function timeinfo(): ResponseInterface
    {
        return $this->connection->get('sntp/timeinfo');
    }
}
