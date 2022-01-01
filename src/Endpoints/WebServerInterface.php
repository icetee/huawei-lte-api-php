<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface WebServerInterface
{
    public function publickey(): ResponseInterface;

    public function token(): ResponseInterface;

    public function whiteListSwitch(): ResponseInterface;

    /**
     * Get session token info
     */
    public function sesTokInfo(): ResponseInterface;
}
