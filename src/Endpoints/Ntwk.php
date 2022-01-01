<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Ntwk extends AbstractEndpoint implements NtwkInterface
{
    public function lanUpnpPortmapping(): ResponseInterface
    {
        return $this->connection->get('ntwk/lan_upnp_portmapping');
    }

    public function celllock(): ResponseInterface
    {
        return $this->connection->get('ntwk/celllock');
    }
}
