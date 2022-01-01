<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

/**
 * Phone Book
 */
final class Pb extends AbstractEndpoint implements PbInterface
{
    /**
     * Find number in PhoneBook
     */
    public function getPbMatch(string $phoneNumber): ResponseInterface
    {
        return $this->connection->post('pb/pb-match', [
            'Phone' => $phoneNumber,
        ]);
    }

    public function getPbList(int $page, string $keyWord = '', int $groupId = 0, int $readCount = 50): ResponseInterface
    {
        return $this->connection->post('pb/pb-list', [
            'GroupID'   => $groupId,
            'PageIndex' => $page,
            'ReadCount' => $readCount,
            'KeyWord'   => $keyWord,
        ]);
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function pbCount(): ResponseInterface
    {
        return $this->connection->post('pb/pb-count', []);
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function groupCount(): ResponseInterface
    {
        return $this->connection->post('pb/group-count', []);
    }
}
