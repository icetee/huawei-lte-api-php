<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum BoxTypeEnum: int
{
    case LOCAL_INBOX = 1;
    case LOCAL_SENT  = 2;
    case LOCAL_DRAFT = 3;
    case LOCAL_TRASH = 4;
    case SIM_INBOX   = 5;
    case SIM_SENT    = 6;
    case SIM_DRAFT   = 7;
    case MIX_INBOX   = 8;
    case MIX_SENT    = 9;
    case MIX_DRAFT   = 10;

    public function key(): string
    {
        return (string) $this->value;
    }
}
// phpcs:enable
