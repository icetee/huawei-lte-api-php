<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Statistic extends AbstractEndpoint implements StatisticInterface
{
    public function featureRoamStatistic(): ResponseInterface
    {
        return $this->connection->get('statistic/feature-roam-statistic');
    }
}
