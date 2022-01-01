<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum SaveModeEnum: int
{
    case LOCAL          = 0;
    case SIM_CARD       = 1;
    case SIM_CARD_FIRST = 2;
    case LOCAL_FIRST    = 3;

    public function key(): string
    {
        return (string) $this->value;
    }
}
// phpcs:enable
