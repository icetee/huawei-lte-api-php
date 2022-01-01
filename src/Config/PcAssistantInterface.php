<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\ResponseInterface;

interface PcAssistantInterface
{
    public function config(): ResponseInterface;

    public function updateautorun(): ResponseInterface;
}
