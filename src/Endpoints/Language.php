<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Language extends AbstractEndpoint implements LanguageInterface
{
    public function setCurrentLanguage(string $currentLanguage): ResponseInterface
    {
        return $this->connection->post('language/current-language', [
            'CurrentLanguage' => $currentLanguage,
        ]);
    }

    public function currentLanguage(): ResponseInterface
    {
        return $this->connection->get('language/current-language');
    }
}
