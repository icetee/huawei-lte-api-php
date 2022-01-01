<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface TimeRuleInterface
{
    // phpcs:ignore Generic.NamingConventions.ConstructorName
    public function timerule(): ResponseInterface;
}
