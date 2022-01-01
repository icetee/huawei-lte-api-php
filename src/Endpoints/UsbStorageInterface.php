<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface UsbStorageInterface
{
    public function fsstatus(): ResponseInterface;

    public function usbaccount(): ResponseInterface;
}
