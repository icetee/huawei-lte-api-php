<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Pb extends AbstractEndpoint implements PbInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('pb/config.xml', [], 'config');
    }
}
