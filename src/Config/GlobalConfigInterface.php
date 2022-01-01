<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\ResponseInterface;

interface GlobalConfigInterface
{
    public function config(): ResponseInterface;
}
