<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum WepEncryptModeEnum: string
{
    case NONE   = 'NONE';
    case WEP    = 'WEP';
    case WEP64  = 'WEP64';
    case WEP128 = 'WEP128';
}
// phpcs:enable
