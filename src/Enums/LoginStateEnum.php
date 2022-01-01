<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum LoginStateEnum: int
{
    case LOGGED_IN  = 0;
    case LOGGED_OUT = -1;
    case REPEAT     = -2;

    public function key(): string
    {
        return (string) $this->value;
    }
}
// phpcs:enable
