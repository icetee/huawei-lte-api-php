<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\ResponseInterface;

interface WifiInterface
{
    public function config(): ResponseInterface;

    public function configure(): ResponseInterface;

    public function countryChannel(): ResponseInterface;

    public function channelAutoMatchHardware(): ResponseInterface;
}
