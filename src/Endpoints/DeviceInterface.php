<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\Enums\AntennaTypeEnum;
use Icetee\HuaweiAPI\Enums\ControlModeEnum;
use Icetee\HuaweiAPI\ResponseInterface;

interface DeviceInterface
{
    public function information(): ResponseInterface;

    public function autorunVersion(): ResponseInterface;

    public function deviceFeatureSwitch(): ResponseInterface;

    public function basicInformation(): ResponseInterface;

    public function basicInformationSec(): ResponseInterface;

    public function usbTetheringSwitch(): ResponseInterface;

    public function bootTime(): ResponseInterface;

    public function setControl(ControlModeEnum $control = ControlModeEnum::POWER_OFF): ResponseInterface;

    public function signal(): ResponseInterface;

    public function antennaStatus(): ResponseInterface;

    public function getAntennaSettings(): ResponseInterface;

    public function setAntennaSettings(AntennaTypeEnum $antennaType = AntennaTypeEnum::AUTO): ResponseInterface;

    public function antennaType(): ResponseInterface;

    public function antennaSetType(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function logsetting(): ResponseInterface;
}
