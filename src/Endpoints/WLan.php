<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\Enums\AuthModeEnum;
use Icetee\HuaweiAPI\Enums\WepEncryptModeEnum;
use Icetee\HuaweiAPI\Enums\WpaEncryptModeEnum;
use Icetee\HuaweiAPI\ResponseInterface;

final class WLan extends AbstractEndpoint implements WLanInterface
{
    public function wifiFeatureSwitch(): ResponseInterface
    {
        return $this->connection->get('wlan/wifi-feature-switch');
    }

    public function stationInformation(): ResponseInterface
    {
        return $this->connection->get('wlan/station-information');
    }

    public function basicSettings(): ResponseInterface
    {
        return $this->connection->get('wlan/basic-settings');
    }

    public function setBasicSettings(
        string $ssid,
        bool $hide = false,
        bool $wifiRestart = false
    ): ResponseInterface {
        return $this->connection->post('wlan/basic-settings', [
            'WifiSsid'    => $ssid,
            'WifiHide'    => $hide,
            'WifiRestart' => $wifiRestart ? 1 : 0,
        ]);
    }

    public function securitySettings(): ResponseInterface
    {
        return $this->connection->get('wlan/security-settings');
    }

    public function setSecuritySettings(
        string $wpaPsk,
        string $wepKey = '',
        WpaEncryptModeEnum $wpaEncryptionMode = WpaEncryptModeEnum::MIX,
        WepEncryptModeEnum $wepEncryptionMode = WepEncryptModeEnum::WEP128,
        AuthModeEnum $authMode = AuthModeEnum::AUTO,
        bool $wifiRestart = true
    ): ResponseInterface {
        return $this->connection->post('wlan/security-settings', [
            'WifiAuthmode'             => $authMode->value,
            'WifiWepKey1'              => $wepKey,
            'WifiWpaencryptionmodes'   => $wpaEncryptionMode->value,
            'WifiBasicencryptionmodes' => $wepEncryptionMode->value,
            'WifiWpapsk'               => $wpaPsk,
            'WifiRestart'              => $wifiRestart ? 1 : 0,
        ]);
    }

    public function multiSecuritySettings(): ResponseInterface
    {
        return $this->connection->get('wlan/multi-security-settings');
    }

    public function multiSecuritySettingsEx(): ResponseInterface
    {
        return $this->connection->get('wlan/multi-security-settings-ex');
    }

    public function multiBasicSettings(): ResponseInterface
    {
        return $this->connection->get('wlan/multi-basic-settings');
    }

    /**
     * @param array $clients list of dicts with format {'wifihostname': hostname,'WifiMacFilterMac': mac}
     */
    public function setMultiBasicSettings(array $clients): ResponseInterface
    {
        return $this->connection->post('wlan/multi-basic-settings', [
            'Ssids'       => [
                'Ssid' => $clients,
            ],
            'WifiRestart' => 1,
        ]);
    }

    public function hostList(): ResponseInterface
    {
        $response = $this->connection->get('wlan/host-list');

        if ($response->getXmlContent()->Hosts->value === null) {
            $response->getXmlContent()->addChild('Hosts');
        }

        if ($response->getXmlContent()->Hosts->Host->value === null) {
            $response->getXmlContent()->Hosts->addChild('Host');
        }

        return $response;
    }

    public function handoverSetting(): ResponseInterface
    {
        return $this->connection->get('wlan/handover-setting');
    }

    /** @param int $handover G3_PREFER = 0, WIFI_PREFER = 2 */
    public function setHandoverSetting(int $handover): ResponseInterface
    {
        return $this->connection->post('wlan/handover-setting', [
            'Handover' => $handover,
        ]);
    }

    public function multiSwitchSettings(): ResponseInterface
    {
        return $this->connection->get('wlan/multi-switch-settings');
    }

    public function multiMacfilterSettings(): ResponseInterface
    {
        return $this->connection->get('wlan/multi-macfilter-settings');
    }

    /**
     * @param array $clients list of dicts with format {'wifihostname': hostname,'WifiMacFilterMac': mac}
     */
    public function setMultiMacfilterSettings(array $clients): ResponseInterface
    {
        return $this->connection->post('wlan/multi-macfilter-settings', [
            'Ssids' => [
                'Ssid' => $clients,
            ],
        ]);
    }

    public function multiMacfilterSettingsEx(): ResponseInterface
    {
        return $this->connection->get('wlan/multi-macfilter-settings-ex');
    }

    public function macFilter(): ResponseInterface
    {
        return $this->connection->get('wlan/mac-filter');
    }

    public function setMacFilter(string $hostname, string $mac): ResponseInterface
    {
        return $this->connection->post('wlan/mac-filter', [
            'wifihostname'     => $hostname,
            'WifiMacFilterMac' => $mac,
        ]);
    }

    public function oledShowpassword(): ResponseInterface
    {
        return $this->connection->get('wlan/oled-showpassword');
    }

    public function wps(): ResponseInterface
    {
        return $this->connection->get('wlan/wps');
    }

    public function wpsAppin(): ResponseInterface
    {
        return $this->connection->get('wlan/wps-appin');
    }

    public function wpsPbc(): ResponseInterface
    {
        return $this->connection->get('wlan/wps-pbc');
    }

    public function wpsSwitch(): ResponseInterface
    {
        return $this->connection->get('wlan/wps-switch');
    }

    public function statusSwitchSettings(): ResponseInterface
    {
        return $this->connection->get('wlan/status-switch-settings');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage, probably not implemented by Huawei
     */
    public function wifiprofile(): ResponseInterface
    {
        return $this->connection->get('wlan/wifiprofile');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage, probably not implemented by Huawei
     */
    public function wififrequence(): ResponseInterface
    {
        return $this->connection->get('wlan/wififrequence');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage, probably not implemented by Huawei
     */
    public function wifiscanresult(): ResponseInterface
    {
        return $this->connection->get('wlan/wifiscanresult');
    }
}
