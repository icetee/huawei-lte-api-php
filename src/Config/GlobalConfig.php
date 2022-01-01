<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class GlobalConfig extends AbstractEndpoint implements GlobalConfigInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('global/config.xml', [], 'config');
    }

    public function languagelist(): ResponseInterface
    {
        return $this->connection->get('global/languagelist.xml', [], 'config');
    }

    public function netType(): ResponseInterface
    {
        return $this->connection->get('global/net-type.xml', [], 'config');
    }
}
