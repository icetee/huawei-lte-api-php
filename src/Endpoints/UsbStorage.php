<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class UsbStorage extends AbstractEndpoint implements UsbStorageInterface
{
    public function fsstatus(): ResponseInterface
    {
        return $this->connection->get('usbstorage/fsstatus');
    }

    public function usbaccount(): ResponseInterface
    {
        return $this->connection->get('usbstorage/usbaccount');
    }
}
