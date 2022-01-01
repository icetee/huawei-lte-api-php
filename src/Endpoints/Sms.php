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

use function strlen;

final class Sms extends AbstractEndpoint implements SmsInterface
{
    public function getCbsnewslist(): ResponseInterface
    {
        return $this->connection->get('sms/get-cbsnewslist');
    }

    public function smsCount(): ResponseInterface
    {
        return $this->connection->get('sms/sms-count');
    }

    public function splitinfoSms(): ResponseInterface
    {
        return $this->connection->get('sms/splitinfo-sms');
    }

    public function smsFeatureSwitch(): ResponseInterface
    {
        return $this->connection->get('sms/sms-feature-switch');
    }

    public function sendStatus(): ResponseInterface
    {
        return $this->connection->get('sms/send-status');
    }

    public function getSmsList(
        int $page = 1,
        BoxTypeEnum $boxType = BoxTypeEnum::LOCAL_INBOX,
        int $readCount = 20,
        int $sortType = 0,
        int $ascending = 0,
        int $unreadPreferred = 0
    ): ResponseInterface {
        return $this->connection->post('sms/send-list', [
            'PageIndex'       => $page,
            'ReadCount'       => $readCount,
            'BoxType'         => $boxType->key(),
            'SortType'        => $sortType,
            'Ascending'       => $ascending,
            'UnreadPreferred' => $unreadPreferred,
        ]);
    }

    /**
     * Delete single SMS by its ID
     *
     * @param int $smsId Id of SMS you wish to delete
     */
    public function deleteSms(int $smsId): ResponseInterface
    {
        return $this->connection->post('sms/delete-sms', [
            'Index' => $smsId,
        ]);
    }

    public function backupSim(DateTime $fromDate, bool $isMove = false): ResponseInterface
    {
        return $this->connection->post('sms/backup-sim', [
            'IsMove' => $isMove ? 1 : 0,
            'Date'   => $fromDate->format('Y-m-d H:i:s'),
        ]);
    }

    public function setRead(int $smsId): ResponseInterface
    {
        return $this->connection->post('sms/set-read', [
            'Index' => $smsId,
        ]);
    }

    public function saveSms(
        array $phoneNumbers,
        string $message,
        int $smsIndex = -1,
        string $sca = '',
        TextModeEnum $textMode = TextModeEnum::SEVEN_BIT,
        ?DateTime $fromDate = null
    ): ResponseInterface {
        if ($fromDate === null) {
            $fromDate = new DateTime();
        }

        return $this->connection->post('sms/save-sms', [
            'Index'    => $smsIndex,
            'Phones'   => ['Phone' => $phoneNumbers],
            'Sca'      => $sca,
            'Content'  => $message,
            'Length'   => strlen($message),
            'Reserved' => $textMode->key(),
            'Date'     => $fromDate->format('Y-m-d H:i:s'),
        ]);
    }

    public function sendSms(
        array $phoneNumbers,
        string $message,
        int $smsIndex = -1,
        string $sca = '',
        TextModeEnum $textMode = TextModeEnum::SEVEN_BIT,
        ?DateTime $date = null
    ): ResponseInterface {
        if ($date === null) {
            $date = new DateTime();
        }

        return $this->connection->post('sms/send-sms', [
            'Index'    => $smsIndex,
            'Phones'   => ['Phone' => $phoneNumbers],
            'Sca'      => $sca,
            'Content'  => $message,
            'Length'   => strlen($message),
            'Reserved' => $textMode->key(),
            'Date'     => $date->format('Y-m-d H:i:s'),
        ]);
    }

    public function cancelSend(int $smsId): ResponseInterface
    {
        return $this->connection->post('sms/cancel-send', [
            'request' => 1,
        ]);
    }

    public function config(): ResponseInterface
    {
        return $this->connection->get('sms/config');
    }

    public function setConfig(
        string $sca = '',
        SaveModeEnum $saveMode = SaveModeEnum::LOCAL,
        int $validity = 10752,
        bool $useSusReport = false,
        SendTypeEnum $sendType = SendTypeEnum::SEND,
        PriorityEnum $priority = PriorityEnum::NORMAL
    ): ResponseInterface {
        return $this->connection->post('sms/config', [
            'SaveMode'   => $saveMode->key(),
            'Validity'   => $validity,
            'Sca'        => $sca,
            'UseSReport' => $useSusReport,
            'SendType'   => $sendType->key(),
            'Priority'   => $priority->key(),
        ]);
    }

    public function smsCountContact(): ResponseInterface
    {
        return $this->connection->get('sms/sms-count-contact');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function getSmsListPdu(): ResponseInterface
    {
        return $this->connection->get('sms/sms-list-pdu');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function splitSms(): ResponseInterface
    {
        return $this->connection->get('sms/split-sms');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function sendSmsPdu(): ResponseInterface
    {
        return $this->connection->get('sms/send-sms-pdu');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function recoverSms(): ResponseInterface
    {
        return $this->connection->get('sms/recover-sms');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function copySms(): ResponseInterface
    {
        return $this->connection->get('sms/copy-sms');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function moveSms(): ResponseInterface
    {
        return $this->connection->get('sms/move-sms');
    }
}
