<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Ussd extends AbstractEndpoint implements UssdInterface
{
    public function prepaidussd(): ResponseInterface
    {
        return $this->connection->get('ussd/prepaidussd.xml', [], 'config');
    }

    public function postpaidussd(): ResponseInterface
    {
        return $this->connection->get('ussd/postpaidussd.xml', [], 'config');
    }
}
