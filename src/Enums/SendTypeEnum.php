<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum SendTypeEnum: int
{
    case SEND          = 0;
    case SEND_AND_SAVE = 1;

    public function key(): string
    {
        return (string) $this->value;
    }
}
// phpcs:enable
