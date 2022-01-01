<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class WebUICfg extends AbstractEndpoint implements WebUICfgInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('webuicfg/config.xml', [], 'config');
    }
}
