<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Voice extends AbstractEndpoint implements VoiceInterface
{
    public function featureswitch(): ResponseInterface
    {
        return $this->connection->get('voice/featureswitch');
    }

    public function sipaccount(): ResponseInterface
    {
        return $this->connection->get('voice/sipaccount');
    }

    public function sipadvance(): ResponseInterface
    {
        return $this->connection->get('voice/sipadvance');
    }

    public function sipserver(): ResponseInterface
    {
        return $this->connection->get('voice/sipserver');
    }

    public function speeddial(): ResponseInterface
    {
        return $this->connection->get('voice/speeddial');
    }

    public function functioncode(): ResponseInterface
    {
        return $this->connection->get('voice/functioncode');
    }

    public function voiceadvance(): ResponseInterface
    {
        return $this->connection->get('voice/voiceadvance');
    }

    public function voicebusy(): ResponseInterface
    {
        return $this->connection->get('voice/voicebusy');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage, probably not implemented by Huawei
     */
    public function codec(): ResponseInterface
    {
        return $this->connection->get('voice/codec');
    }
}
