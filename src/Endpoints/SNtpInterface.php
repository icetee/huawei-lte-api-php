<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface SNtpInterface
{
    public function getSettings(): ResponseInterface;

    public function sntpswitch(): ResponseInterface;

    public function serverinfo(): ResponseInterface;

    public function timeinfo(): ResponseInterface;
}
