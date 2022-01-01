<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface RedirectionInterface
{
    public function homepage(): ResponseInterface;
}
