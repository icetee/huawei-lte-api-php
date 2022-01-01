<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Cwmp extends AbstractEndpoint implements CwmpInterface
{
    public function basicInfo(): ResponseInterface
    {
        return $this->connection->get('cwmp/basic-info');
    }
}
