<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class WebServer extends AbstractEndpoint implements WebServerInterface
{
    public function publickey(): ResponseInterface
    {
        return $this->connection->get('webserver/publickey');
    }

    public function token(): ResponseInterface
    {
        return $this->connection->get('webserver/token');
    }

    public function whiteListSwitch(): ResponseInterface
    {
        return $this->connection->get('webserver/white_list_switch');
    }

    /**
     * Get session token info
     */
    public function sesTokInfo(): ResponseInterface
    {
        return $this->connection->get('webserver/SesTokInfo');
    }
}
