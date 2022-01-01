<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Monitoring extends AbstractEndpoint implements MonitoringInterface
{
    public function convergedStatus(): ResponseInterface
    {
        return $this->connection->get('monitoring/converged-status');
    }

    public function status(): ResponseInterface
    {
        return $this->connection->get('monitoring/status');
    }

    public function checkNotifications(): ResponseInterface
    {
        return $this->connection->get('monitoring/check-notifications');
    }

    public function trafficStatistics(): ResponseInterface
    {
        return $this->connection->get('monitoring/traffic-statistics');
    }

    public function startDate(): ResponseInterface
    {
        return $this->connection->get('monitoring/start_date');
    }

    /**
     * Sets network usage alarm for LTE
     *
     * @param int $startDay number of day when monitoring starts
     * @param string $dataLimit Maximal data limit as string eg.: 1000MB or 1GB and so on
     * @param int $monthThreshold Alarm threshold in % as int number eg.: 90
     */
    public function setStartDate(int $startDay, string $dataLimit, int $monthThreshold): ResponseInterface
    {
        return $this->connection->post('monitoring/start_date', [
            'StartDay'       => $startDay,
            'DataLimit'      => $dataLimit,
            'MonthThreshold' => $monthThreshold,
            'SetMonthData'   => 1,
        ]);
    }

    public function startDateWlan(): ResponseInterface
    {
        return $this->connection->get('monitoring/start_date_wlan');
    }

    /**
     * Sets network usage alarm for WLAN
     *
     * @param int $startDay number of day when monitoring starts
     * @param string $dataLimit Maximal data limit as string eg.: 1000MB or 1GB and so on
     * @param int $monthThreshold Alarm threshold in % as int number eg.: 90
     */
    public function setStartDateWlan(int $startDay, string $dataLimit, int $monthThreshold): ResponseInterface
    {
        return $this->connection->post('monitoring/start_date_wlan', [
            'StartDay'       => $startDay,
            'DataLimit'      => $dataLimit,
            'MonthThreshold' => $monthThreshold,
            'SettingEnable'  => 1, //!FIXME
        ]);
    }

    public function monthStatistics(): ResponseInterface
    {
        return $this->connection->get('monitoring/month_statistics');
    }

    public function monthStatisticsWlan(): ResponseInterface
    {
        return $this->connection->get('monitoring/month_statistics_wlan');
    }

    public function setClearTraffic(): ResponseInterface
    {
        return $this->connection->post('monitoring/clear-traffic', [
            'ClearTraffic' => 1,
        ]);
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage, probably not implemented by Huawei
     */
    public function wifiMonthSetting(): ResponseInterface
    {
        return $this->connection->get('monitoring/wifi-month-setting');
    }
}
