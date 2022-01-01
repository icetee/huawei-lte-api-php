<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Pincode extends AbstractEndpoint implements PincodeInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('pincode/config.xml', [], 'config');
    }
}
