<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use DateTime;
use Icetee\HuaweiAPI\Enums\BoxTypeEnum;
use Icetee\HuaweiAPI\Enums\PriorityEnum;
use Icetee\HuaweiAPI\Enums\SaveModeEnum;
use Icetee\HuaweiAPI\Enums\SendTypeEnum;
use Icetee\HuaweiAPI\Enums\TextModeEnum;
use Icetee\HuaweiAPI\ResponseInterface;

interface SmsInterface
{
    public function getCbsnewslist(): ResponseInterface;

    public function smsCount(): ResponseInterface;

    public function splitinfoSms(): ResponseInterface;

    public function smsFeatureSwitch(): ResponseInterface;

    public function sendStatus(): ResponseInterface;

    public function getSmsList(
        int $page = 1,
        BoxTypeEnum $boxType = BoxTypeEnum::LOCAL_INBOX,
        int $readCount = 20,
        int $sortType = 0,
        int $ascending = 0,
        int $unreadPreferred = 0
    ): ResponseInterface;

    /**
     * Delete single SMS by its ID
     *
     * @param int $smsId Id of SMS you wish to delete
     */
    public function deleteSms(int $smsId): ResponseInterface;

    public function backupSim(DateTime $fromDate, bool $isMove = false): ResponseInterface;

    public function setRead(int $smsId): ResponseInterface;

    public function saveSms(
        array $phoneNumbers,
        string $message,
        int $smsIndex = -1,
        string $sca = '',
        TextModeEnum $textMode = TextModeEnum::SEVEN_BIT,
        ?DateTime $fromDate = null
    ): ResponseInterface;

    public function sendSms(
        array $phoneNumbers,
        string $message,
        int $smsIndex = -1,
        string $sca = '',
        TextModeEnum $textMode = TextModeEnum::SEVEN_BIT,
        ?DateTime $date = null
    ): ResponseInterface;

    public function cancelSend(int $smsId): ResponseInterface;

    public function config(): ResponseInterface;

    public function setConfig(
        string $sca = '',
        SaveModeEnum $saveMode = SaveModeEnum::LOCAL,
        int $validity = 10752,
        bool $useSusReport = false,
        SendTypeEnum $sendType = SendTypeEnum::SEND,
        PriorityEnum $priority = PriorityEnum::NORMAL
    ): ResponseInterface;

    public function smsCountContact(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function getSmsListPdu(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function splitSms(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function sendSmsPdu(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function recoverSms(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function copySms(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function moveSms(): ResponseInterface;
}
