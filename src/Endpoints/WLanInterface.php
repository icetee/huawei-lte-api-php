<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\Enums\AuthModeEnum;
use Icetee\HuaweiAPI\Enums\WepEncryptModeEnum;
use Icetee\HuaweiAPI\Enums\WpaEncryptModeEnum;
use Icetee\HuaweiAPI\ResponseInterface;

interface WLanInterface
{
    public function wifiFeatureSwitch(): ResponseInterface;

    public function stationInformation(): ResponseInterface;

    public function basicSettings(): ResponseInterface;

    public function setBasicSettings(
        string $ssid,
        bool $hide = false,
        bool $wifiRestart = false
    ): ResponseInterface;

    public function securitySettings(): ResponseInterface;

    public function setSecuritySettings(
        string $wpaPsk,
        string $wepKey = '',
        WpaEncryptModeEnum $wpaEncryptionMode = WpaEncryptModeEnum::MIX,
        WepEncryptModeEnum $wepEncryptionMode = WepEncryptModeEnum::WEP128,
        AuthModeEnum $authMode = AuthModeEnum::AUTO,
        bool $wifiRestart = true
    ): ResponseInterface;

    public function multiSecuritySettings(): ResponseInterface;

    public function multiSecuritySettingsEx(): ResponseInterface;

    public function multiBasicSettings(): ResponseInterface;

    /**
     * @param array $clients list of dicts with format {'wifihostname': hostname,'WifiMacFilterMac': mac}
     */
    public function setMultiBasicSettings(array $clients): ResponseInterface;

    public function hostList(): ResponseInterface;

    public function handoverSetting(): ResponseInterface;

    /** @param int $handover G3_PREFER = 0, WIFI_PREFER = 2 */
    public function setHandoverSetting(int $handover): ResponseInterface;

    public function multiSwitchSettings(): ResponseInterface;

    public function multiMacfilterSettings(): ResponseInterface;

    /**
     * @param array $clients list of dicts with format {'wifihostname': hostname,'WifiMacFilterMac': mac}
     */
    public function setMultiMacfilterSettings(array $clients): ResponseInterface;

    public function multiMacfilterSettingsEx(): ResponseInterface;

    public function macFilter(): ResponseInterface;

    public function setMacFilter(string $hostname, string $mac): ResponseInterface;

    public function oledShowpassword(): ResponseInterface;

    public function wps(): ResponseInterface;

    public function wpsAppin(): ResponseInterface;

    public function wpsPbc(): ResponseInterface;

    public function wpsSwitch(): ResponseInterface;

    public function statusSwitchSettings(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage, probably not implemented by Huawei
     */
    public function wifiprofile(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage, probably not implemented by Huawei
     */
    public function wififrequence(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage, probably not implemented by Huawei
     */
    public function wifiscanresult(): ResponseInterface;
}
