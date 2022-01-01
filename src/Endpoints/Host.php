<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use DateTime;
use DateTimeInterface;
use Icetee\HuaweiAPI\ResponseInterface;

final class Host extends AbstractEndpoint implements HostInterface
{
    public function info(DateTime $dateTime, string $platform, string $userAgent, string $version): ResponseInterface
    {
        return $this->connection->post('host/info', [
            'Time'         => $dateTime->format(DateTimeInterface::RFC7231),
            'Timezone'     => 'GMT' . $dateTime->format('O'),
            'Platform'     => $platform,
            'PlatformVer'  => $userAgent,
            'Navigator'    => $version,
            'NavigatorVer' => $userAgent,
        ]);
    }
}
