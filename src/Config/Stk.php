<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Stk extends AbstractEndpoint implements StkInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('stk/config.xml', [], 'config');
    }
}
