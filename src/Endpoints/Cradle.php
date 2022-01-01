<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Cradle extends AbstractEndpoint implements CradleInterface
{
    public function statusInfo(): ResponseInterface
    {
        return $this->connection->get('cradle/status-info');
    }

    public function featureSwitch(): ResponseInterface
    {
        return $this->connection->get('cradle/feature-switch');
    }

    public function basicInfo(): ResponseInterface
    {
        return $this->connection->get('cradle/basic-info');
    }

    public function factoryMac(): ResponseInterface
    {
        return $this->connection->get('cradle/factory-mac');
    }

    public function macInfo(): ResponseInterface
    {
        return $this->connection->get('cradle/mac-info');
    }
}
