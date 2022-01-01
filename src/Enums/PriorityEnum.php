<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum PriorityEnum: int
{
    case NORMAL      = 0;
    case INTERACTIVE = 1;
    case URGENT      = 2;
    case EMERGENCY   = 3;

    public function key(): string
    {
        return (string) $this->value;
    }
}
// phpcs:enable
