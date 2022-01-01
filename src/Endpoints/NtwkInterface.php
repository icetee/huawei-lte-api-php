<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface NtwkInterface
{
    public function lanUpnpPortmapping(): ResponseInterface;

    public function celllock(): ResponseInterface;
}
