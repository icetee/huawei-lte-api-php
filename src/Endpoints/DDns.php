<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class DDns extends AbstractEndpoint implements DDnsInterface
{
    public function getDdnsList(): ResponseInterface
    {
        return $this->connection->get('ddns/ddns-list');
    }

    public function getStatus(): ResponseInterface
    {
        return $this->connection->get('ddns/ddns-list');
    }
}
