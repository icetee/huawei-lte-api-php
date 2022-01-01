<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Exception;
use Icetee\HuaweiAPI\ResponseInterface;

use function in_array;
use function pathinfo;
use function strtolower;

final class FileManager extends AbstractEndpoint implements FileManagerInterface
{
    /**
     * Uploads firmware update and triggers it
     *
     * @param string $filePath file to upload
     * @param string $uploadfileName name of uploaded file
     */
    public function upload(string $filePath, string $uploadfileName): ResponseInterface
    {
        $pathInfo = pathinfo($filePath);
        $ext      = strtolower($pathInfo['extension']);

        if (in_array($ext, ['bin', 'zip', true])) {
            throw new Exception('Only *.bin or *.zip is allowed');
        }

        return $this->connection->postFile('filemanager/upload', $filePath, [
            'cur_path' => 'OU:' . $pathInfo['basename'],
        ]);
    }
}
