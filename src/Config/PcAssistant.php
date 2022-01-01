<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class PcAssistant extends AbstractEndpoint implements PcAssistantInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('pcassistant/config.xml', [], 'config');
    }

    public function updateautorun(): ResponseInterface
    {
        return $this->connection->get('pcassistant/updateautorun.xml', [], 'config');
    }
}
