<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum ControlModeEnum: int
{
    case REBOOT    = 1;
    case POWER_OFF = 4;

    public function key(): string
    {
        return (string) $this->value;
    }
}
// phpcs:enable
