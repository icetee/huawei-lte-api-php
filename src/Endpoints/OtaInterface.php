<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface OtaInterface
{
    public function status(): ResponseInterface;
}
