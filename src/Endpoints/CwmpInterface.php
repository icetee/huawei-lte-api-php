<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface CwmpInterface
{
    public function basicInfo(): ResponseInterface;
}
