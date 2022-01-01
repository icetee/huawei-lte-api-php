<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Update extends AbstractEndpoint implements UpdateInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('update/config.xml', [], 'config');
    }
}
