<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class SdCard extends AbstractEndpoint implements SdCardInterface
{
    public function dlnaSetting(): ResponseInterface
    {
        return $this->connection->get('sdcard/dlna-setting');
    }

    public function setDlnaSetting(bool $enabled, bool $shareAll, string $sharePath = '/'): ResponseInterface
    {
        return $this->connection->post('sdcard/dlna-setting', [
            'enabled'      => $enabled ? 1 : 0,
            'sharepath'    => $sharePath,
            'shareallpath' => $shareAll ? 1 : 0,
        ]);
    }

    // phpcs:ignore Generic.NamingConventions.ConstructorName
    public function sdcard(): ResponseInterface
    {
        return $this->connection->get('sdcard/sdcard');
    }

    public function sdcardsamba(): ResponseInterface
    {
        return $this->connection->get('sdcard/sdcardsamba');
    }

    public function setSdcardsamba(
        bool $enabled,
        string $serverName = 'homerouter.cpe',
        string $serverDescription = 'samba server',
        string $workgroupName = 'WORKGROUP',
        bool $anonymousAccess = false,
        bool $printerEnabled = true
    ): ResponseInterface {
        return $this->connection->post('sdcard/sdcardsamba', [
            'enabled'           => $enabled ? 1 : 0,
            'servername'        => $serverName,
            'serverdescription' => $serverDescription,
            'workgroupname'     => $workgroupName,
            'anonymousaccess'   => $anonymousAccess ? 1 : 0,
            'printerenable'     => $printerEnabled ? 1 : 0,
        ]);
    }

    public function printerlist(): ResponseInterface
    {
        return $this->connection->get('sdcard/printerlist');
    }

    public function shareAccount(): ResponseInterface
    {
        return $this->connection->get('sdcard/share-account');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function sdfile(): ResponseInterface
    {
        return $this->connection->get('sdcard/sdfile');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function fileupload(): ResponseInterface
    {
        return $this->connection->get('sdcard/fileupload');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function checkFileExist(): ResponseInterface
    {
        return $this->connection->get('sdcard/Check_file_exist');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function createdir(): ResponseInterface
    {
        return $this->connection->get('sdcard/createdir');
    }

    /**
     * Endpoint found by reverse engineering B310s-22 firmware, unknown usage
     */
    public function deletefile(): ResponseInterface
    {
        return $this->connection->get('sdcard/deletefile');
    }
}
