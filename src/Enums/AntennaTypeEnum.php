<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum AntennaTypeEnum: int
{
    case INTEGRATED       = 0;
    case EXTERNAL_1_AND_2 = 1;
    case EXTERNAL_1       = 2;
    case AUTO             = 3;

    public function key(): string
    {
        return (string) $this->value;
    }
}
// phpcs:enable
