<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface PbInterface
{
    /**
     * Find number in PhoneBook
     */
    public function getPbMatch(string $phoneNumber): ResponseInterface;

    public function getPbList(int $page, string $keyWord = '', int $groupId = 0, int $readCount = 50): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function pbCount(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function groupCount(): ResponseInterface;
}
