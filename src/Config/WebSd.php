<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class WebSd extends AbstractEndpoint implements WebSdInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('websd/config.xml', [], 'config');
    }
}
