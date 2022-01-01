<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface VoiceInterface
{
    public function featureswitch(): ResponseInterface;

    public function sipaccount(): ResponseInterface;

    public function sipadvance(): ResponseInterface;

    public function sipserver(): ResponseInterface;

    public function speeddial(): ResponseInterface;

    public function functioncode(): ResponseInterface;

    public function voiceadvance(): ResponseInterface;

    public function voicebusy(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage, probably not implemented by Huawei
     */
    public function codec(): ResponseInterface;
}
