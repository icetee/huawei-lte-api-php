<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\ResponseInterface;

interface NetworkInterface
{
    public function config(): ResponseInterface;

    public function netMode(): ResponseInterface;

    public function networkmode(): ResponseInterface;

    public function networkbandNull(): ResponseInterface;

    public function setOnly4g(): ResponseInterface;
}
