<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Fastboot extends AbstractEndpoint implements FastbootInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('fastboot/config.xml', [], 'config');
    }
}
