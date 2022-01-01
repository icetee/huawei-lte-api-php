<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface DialUpInterface
{
    /**
     * Get current LTE modem toggle state
     */
    public function mobileDataswitch(): ResponseInterface;

    public function connection(): ResponseInterface;

    public function dialupFeatureSwitch(): ResponseInterface;

    public function profiles(): ResponseInterface;

    public function autoApn(): ResponseInterface;

    public function dial(): ResponseInterface;

    /**
     * Toggle LTE modem state
     *
     * @param int $dataswitch: 0 to disable LTE modem, 1 to enable LTE modem
     */
    public function setMobileDataswitch(int $dataswitch = 0): ResponseInterface;
}
