<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Redirection extends AbstractEndpoint implements RedirectionInterface
{
    public function homepage(): ResponseInterface
    {
        return $this->connection->get('redirection/homepage');
    }
}
