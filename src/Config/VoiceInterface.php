<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\ResponseInterface;

interface VoiceInterface
{
    public function config(): ResponseInterface;

    public function country(): ResponseInterface;
}
