<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class TimeRule extends AbstractEndpoint implements TimeRuleInterface
{
    // phpcs:ignore Generic.NamingConventions.ConstructorName
    public function timerule(): ResponseInterface
    {
        return $this->connection->get('time/timerule');
    }
}
