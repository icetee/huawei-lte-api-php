<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use DateTime;
use Icetee\HuaweiAPI\ResponseInterface;

interface HostInterface
{
    public function info(DateTime $dateTime, string $platform, string $userAgent, string $version): ResponseInterface;
}
