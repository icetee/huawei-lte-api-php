<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface DDnsInterface
{
    public function getDdnsList(): ResponseInterface;

    public function getStatus(): ResponseInterface;
}
