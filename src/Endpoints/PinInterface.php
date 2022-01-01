<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface PinInterface
{
    public function status(): ResponseInterface;

    public function simlock(): ResponseInterface;

    public function savePin(): ResponseInterface;

    /**
     * Change pin
     *
     * @param int $operate_type number Operation type to perform (default is `0`).
            0 - verify PIN
            1 - enable PIN verification
            2 - disable PIN verification
            3 - set new PIN
            4 - use of the PUK code
     * @param int|null $currentPin Current PIN number (default is `null`).
     * @param int|null $newPin New PIN number to set (default is `null`).
     * @param int|null $pukCode PUK code to use in case it is required by the device (default is `null`).
     */
    public function operate(int $operateType, ?int $currentPin = null, ?int $newPin = null, ?int $pukCode = null): ResponseInterface;
}
