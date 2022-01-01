<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Usermanual;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class PublicSysResources extends AbstractEndpoint implements PublicSysResourcesInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('public_sys-resources/config.xml', [], 'usermanual');
    }
}
