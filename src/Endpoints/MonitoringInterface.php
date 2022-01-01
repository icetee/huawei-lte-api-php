<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface MonitoringInterface
{
    public function convergedStatus(): ResponseInterface;

    public function status(): ResponseInterface;

    public function checkNotifications(): ResponseInterface;

    public function trafficStatistics(): ResponseInterface;

    public function startDate(): ResponseInterface;

    /**
     * Sets network usage alarm for LTE
     *
     * @param int $startDay number of day when monitoring starts
     * @param string $dataLimit Maximal data limit as string eg.: 1000MB or 1GB and so on
     * @param int $monthThreshold Alarm threshold in % as int number eg.: 90
     */
    public function setStartDate(int $startDay, string $dataLimit, int $monthThreshold): ResponseInterface;

    public function startDateWlan(): ResponseInterface;

    /**
     * Sets network usage alarm for WLAN
     *
     * @param int $startDay number of day when monitoring starts
     * @param string $dataLimit Maximal data limit as string eg.: 1000MB or 1GB and so on
     * @param int $monthThreshold Alarm threshold in % as int number eg.: 90
     */
    public function setStartDateWlan(int $startDay, string $dataLimit, int $monthThreshold): ResponseInterface;

    public function monthStatistics(): ResponseInterface;

    public function monthStatisticsWlan(): ResponseInterface;

    public function setClearTraffic(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage, probably not implemented by Huawei
     */
    public function wifiMonthSetting(): ResponseInterface;
}
