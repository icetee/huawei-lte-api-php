<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\ResponseInterface;

interface UssdInterface
{
    public function prepaidussd(): ResponseInterface;

    public function postpaidussd(): ResponseInterface;
}
