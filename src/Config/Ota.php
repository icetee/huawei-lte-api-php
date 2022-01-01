<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Ota extends AbstractEndpoint implements OtaInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('ota/config.xml', [], 'config');
    }
}
