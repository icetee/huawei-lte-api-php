<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class UsbPrinter extends AbstractEndpoint implements UsbPrinterInterface
{
    public function printerlist(): ResponseInterface
    {
        return $this->connection->get('usbprinter/printerlist');
    }
}
