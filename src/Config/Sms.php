<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Config;

use Icetee\HuaweiAPI\Endpoints\AbstractEndpoint;
use Icetee\HuaweiAPI\ResponseInterface;

final class Sms extends AbstractEndpoint implements SmsInterface
{
    public function config(): ResponseInterface
    {
        return $this->connection->get('sms/config.xml', [], 'config');
    }
}
