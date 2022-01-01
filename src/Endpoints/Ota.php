<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Ota extends AbstractEndpoint implements OtaInterface
{
    public function status(): ResponseInterface
    {
        return $this->connection->get('ota/status');
    }
}
