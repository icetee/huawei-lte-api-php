<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface CradleInterface
{
    public function statusInfo(): ResponseInterface;

    public function featureSwitch(): ResponseInterface;

    public function basicInfo(): ResponseInterface;

    public function factoryMac(): ResponseInterface;

    public function macInfo(): ResponseInterface;
}
