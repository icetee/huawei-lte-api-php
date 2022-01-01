<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface OnlineUpdateInterface
{
    public function checkNewVersion(): ResponseInterface;

    public function setCheckNewVersion(): ResponseInterface;

    public function status(): ResponseInterface;

    public function urlList(): ResponseInterface;

    public function ackNewversion(): ResponseInterface;

    public function setAckNewversion(): ResponseInterface;

    /**
     * Invoking this method is known to cause some devices to reboot.
     */
    public function cancelDownloading(): ResponseInterface;

    public function setCancelDownloading(): ResponseInterface;

    public function upgradeMessagebox(): ResponseInterface;

    public function setUpgradeMessagebox(string $messagebox): ResponseInterface;

    public function configuration(): ResponseInterface;

    public function autoupdateConfig(): ResponseInterface;

    public function redirectCancel(): ResponseInterface;
}
