<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Voice extends AbstractEndpoint implements VoiceInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('voice/config.xml', [], 'config');
    }

    public function country(): ResponseInterface
    {
        return $this->connection->get('voice/country.xml', [], 'config');
    }
}
