<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Usermanual;

use Icetee\HuaweiAPI\ResponseInterface;

interface PublicSysResourcesInterface
{
    public function config(): ResponseInterface;
}
