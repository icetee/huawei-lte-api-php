<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\Enums\AntennaTypeEnum;
use Icetee\HuaweiAPI\Enums\ControlModeEnum;
use Icetee\HuaweiAPI\ResponseInterface;

final class Device extends AbstractEndpoint implements DeviceInterface
{
    public function information(): ResponseInterface
    {
        return $this->connection->get('device/information');
    }

    public function autorunVersion(): ResponseInterface
    {
        return $this->connection->get('device/autorun-version');
    }

    public function deviceFeatureSwitch(): ResponseInterface
    {
        return $this->connection->get('device/device-feature-switch');
    }

    public function basicInformation(): ResponseInterface
    {
        return $this->connection->get('device/basic_information');
    }

    public function basicInformationSec(): ResponseInterface
    {
        return $this->connection->get('device/basicinformation');
    }

    public function usbTetheringSwitch(): ResponseInterface
    {
        return $this->connection->get('device/usb-tethering-switch');
    }

    public function bootTime(): ResponseInterface
    {
        return $this->connection->get('device/boot_time');
    }

    public function setControl(ControlModeEnum $control = ControlModeEnum::POWER_OFF): ResponseInterface
    {
        return $this->connection->post('device/control', [
            'Control' => $control->key(),
        ]);
    }

    public function signal(): ResponseInterface
    {
        return $this->connection->get('device/signal');
    }

    public function antennaStatus(): ResponseInterface
    {
        return $this->connection->get('device/antenna_status');
    }

    public function getAntennaSettings(): ResponseInterface
    {
        return $this->connection->get('device/antenna_settings');
    }

    public function setAntennaSettings(AntennaTypeEnum $antennaType = AntennaTypeEnum::AUTO): ResponseInterface
    {
        return $this->connection->post('device/antenna_settings', [
            'antenna_type' => $antennaType->key(),
        ]);
    }

    public function antennaType(): ResponseInterface
    {
        return $this->connection->get('device/antenna_type');
    }

    public function antennaSetType(): ResponseInterface
    {
        return $this->connection->get('device/antenna_set_type');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function logsetting(): ResponseInterface
    {
        return $this->connection->get('device/logsetting');
    }
}
