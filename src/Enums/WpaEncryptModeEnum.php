<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum WpaEncryptModeEnum: string
{
    case AES  = 'AES';
    case TKIP = 'TKIP';
    case MIX  = 'MIX';
}
// phpcs:enable
