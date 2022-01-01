<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum AuthModeEnum: string
{
    case AUTO         = 'AUTO';
    case OPEN         = 'OPEN';
    case SHARE        = 'SHARE';
    case WPA_PSK      = 'WPA-PSK';
    case WPA2_PSK     = 'WPA2-PSK';
    case WPA_WPA2_PSK = 'WPA/WPA2-PSK';
}
// phpcs:enable
