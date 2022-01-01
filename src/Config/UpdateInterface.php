<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\ResponseInterface;

interface UpdateInterface
{
    public function config(): ResponseInterface;
}
