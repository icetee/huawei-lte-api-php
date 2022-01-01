<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum PasswordTypeEnum: int
{
    case BASE_64                       = 0;
    case BASE_64_AFTER_PASSWORD_CHANGE = 3;
    case SHA256                        = 4;

    public function key(): string
    {
        return (string) $this->value;
    }
}
// phpcs:enable
