<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Bluetooth extends AbstractEndpoint implements BluetoothInterface
{
    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function settings(): ResponseInterface
    {
        return $this->connection->get('bluetooth/settings');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function scan(): ResponseInterface
    {
        return $this->connection->get('bluetooth/scan');
    }
}
