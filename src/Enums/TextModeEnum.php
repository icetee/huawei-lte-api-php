<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum TextModeEnum: int
{
    case UCS2      = 0;
    case SEVEN_BIT = 1;
    case EIGHT_BIT = 2;

    public function key(): string
    {
        return (string) $this->value;
    }
}
// phpcs:enable
