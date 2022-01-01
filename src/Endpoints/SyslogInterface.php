<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface SyslogInterface
{
    public function querylog(): ResponseInterface;

    public function clear(): ResponseInterface;
}
