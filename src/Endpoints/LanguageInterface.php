<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface LanguageInterface
{
    public function setCurrentLanguage(string $currentLanguage): ResponseInterface;

    public function currentLanguage(): ResponseInterface;
}
