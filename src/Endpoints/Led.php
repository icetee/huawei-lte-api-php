<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Led extends AbstractEndpoint implements LedInterface
{
    public function nightmode(): ResponseInterface
    {
        return $this->connection->get('led/nightmode');
    }
}
