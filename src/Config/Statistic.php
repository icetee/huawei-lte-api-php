<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Statistic extends AbstractEndpoint implements StatisticInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('statistic/config.xml', [], 'config');
    }
}
