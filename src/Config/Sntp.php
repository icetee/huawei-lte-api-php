<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Sntp extends AbstractEndpoint implements SntpInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('sntp/config.xml', [], 'config');
    }
}
