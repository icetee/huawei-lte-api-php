<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface FileManagerInterface
{
    /**
     * Uploads firmware update and triggers it
     *
     * @param string $filePath file to upload
     * @param string $uploadfileName name of uploaded file
     */
    public function upload(string $filePath, string $uploadfileName): ResponseInterface;
}
