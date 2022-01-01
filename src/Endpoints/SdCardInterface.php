<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface SdCardInterface
{
    public function dlnaSetting(): ResponseInterface;

    public function setDlnaSetting(bool $enabled, bool $shareAll, string $sharePath = '/'): ResponseInterface;

    // phpcs:ignore Generic.NamingConventions.ConstructorName
    public function sdcard(): ResponseInterface;

    public function sdcardsamba(): ResponseInterface;

    public function setSdcardsamba(
        bool $enabled,
        string $serverName = 'homerouter.cpe',
        string $serverDescription = 'samba server',
        string $workgroupName = 'WORKGROUP',
        bool $anonymousAccess = false,
        bool $printerEnabled = true
    ): ResponseInterface;

    public function printerlist(): ResponseInterface;

    public function shareAccount(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function sdfile(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function fileupload(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function checkFileExist(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function createdir(): ResponseInterface;

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function deletefile(): ResponseInterface;
}
