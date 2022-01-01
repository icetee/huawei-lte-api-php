<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Enums;

// phpcs:disable
enum ApiErrorEnum: int
{
    // Response errors
    case ERROR_SYSTEM_UNKNOWN           = 100001;
    case ERROR_SYSTEM_NO_SUPPORT        = 100002;
    case ERROR_SYSTEM_NO_RIGHTS         = 100003;
    case ERROR_SYSTEM_BUSY              = 100004;
    case ERROR_SYSTEM_WRONG_FORMAT      = 100005;
    case ERROR_SYSTEM_WRONG_PARAMETER   = 100006;
    case ERROR_SYSTEM_WRONG_SAVE_CONFIG = 100007;
    case ERROR_SYSTEM_WRONG_GET_CONFIG  = 100008;

    // Auth errors
    case AUTH_USERNAME_WRONG       = 108001;
    case AUTH_PASSWORD_WRONG       = 108002;
    case AUTH_ALREADY_LOGIN        = 108003;
    case AUTH_PASSWORD_MODIFY_FAIL = 108004;
    case AUTH_TO_MANY_USERS        = 108005;
    case AUTH_USERNAME_PWD_WRONG   = 108006;
    case AUTH_USERNAME_PWD_ORERRUN = 108007;
    case AUTH_LOGIN_ACCESS_DENIED  = 108010;

    case PROFILE_PWD_MODIFY = 115002;

    // Communication errors
    case COM_VOICE_BUSY            = 120001;
    case COM_WRONG_TOKEN           = 125001;
    case COM_WRONG_SESSION_OR_CSRF = 125002;
    case COM_WRONG_SESSION_TOKEN   = 125003;

    // Cradle errors
    case CRADLE_CURRENT_IP_FAILED     = 118001;
    case CRADLE_CURRENT_MAC_FAILED    = 118002;
    case CRADLE_SET_MAC_FAILED        = 118003;
    case CRADLE_GET_WAN_INF_FAILED    = 118004;
    case CRADLE_CODING_FAILED         = 118005;
    case CRADLE_UPDATE_PROFILE_FAILED = 118006;

    public function message(): string
    {
        return match ($this) {
            self::ERROR_SYSTEM_UNKNOWN           => 'Unknown',
            self::ERROR_SYSTEM_NO_SUPPORT        => 'No support',
            self::ERROR_SYSTEM_NO_RIGHTS         => 'No rights (needs login)',
            self::ERROR_SYSTEM_BUSY              => 'System busy',
            self::ERROR_SYSTEM_WRONG_FORMAT      => 'Format error',
            self::ERROR_SYSTEM_WRONG_PARAMETER   => 'Parameter error',
            self::ERROR_SYSTEM_WRONG_SAVE_CONFIG => 'Save config file error',
            self::ERROR_SYSTEM_WRONG_GET_CONFIG  => 'Get config file error',

            self::AUTH_USERNAME_WRONG       => 'Username wrong',
            self::AUTH_PASSWORD_WRONG       => 'Password wrong',
            self::AUTH_ALREADY_LOGIN        => 'Already login',
            self::AUTH_PASSWORD_MODIFY_FAIL => 'Modify password failed',
            self::AUTH_TO_MANY_USERS        => 'Too many users logged in',
            self::AUTH_USERNAME_PWD_WRONG   => 'Username and Password wrong',
            self::AUTH_USERNAME_PWD_ORERRUN => 'Password overrun',
            self::AUTH_LOGIN_ACCESS_DENIED  => 'Access denied, logins are too frequent',

            self::PROFILE_PWD_MODIFY => 'Password modify',

            self::COM_VOICE_BUSY            => 'Voice is busy',
            self::COM_WRONG_TOKEN           => 'Invalid authentication token',
            self::COM_WRONG_SESSION_OR_CSRF => 'Invalid session',
            self::COM_WRONG_SESSION_TOKEN   => 'Invalid session token',

            self::CRADLE_CURRENT_IP_FAILED     => 'Cradle get current connected user IP failed',
            self::CRADLE_CURRENT_MAC_FAILED    => 'Cradle get current connected user MAC failed',
            self::CRADLE_SET_MAC_FAILED        => 'Cradle set MAC failed',
            self::CRADLE_GET_WAN_INF_FAILED    => 'Cradle get WAN information failed',
            self::CRADLE_CODING_FAILED         => 'Cradle coding failure',
            self::CRADLE_UPDATE_PROFILE_FAILED => 'Cradle coding failure',
        };
    }
}
// phpcs:enable
