<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Exceptions;

use Exception;
use Icetee\HuaweiAPI\Enums\ApiErrorEnum;

class ApiResponseException extends Exception
{
    public function __construct(ApiErrorEnum $apiError, ?string $message = null)
    {
        $errorMessage = $message ?? $apiError->message();

        parent::__construct($errorMessage, $apiError->value);
    }
}
