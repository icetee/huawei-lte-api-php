<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\ResponseInterface;

interface DialUpInterface
{
    public function config(): ResponseInterface;

    public function connectmode(): ResponseInterface;

    public function profileswitch(): ResponseInterface;

    public function lmtAutoModeDisconnect(): ResponseInterface;
}
