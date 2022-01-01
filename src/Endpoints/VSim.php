<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class VSim extends AbstractEndpoint implements VSimInterface
{
    public function operateswitchVsim(): ResponseInterface
    {
        return $this->connection->get('vsim/operateswitch-vsim');
    }
}
