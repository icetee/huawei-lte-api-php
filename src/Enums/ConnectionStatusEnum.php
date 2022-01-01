<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum ConnectionStatusEnum: int
{
    case CONNECTING           = 900;
    case CONNECTED            = 901;
    case DISCONNECTED         = 902;
    case DISCONNECTING        = 903;
    case CONNECT_FAILED       = 904;
    case CONNECT_STATUS_NULL  = 905;
    case CONNECT_STATUS_ERROR = 906;

    public function key(): string
    {
        return (string) $this->value;
    }
}
// phpcs:enable
