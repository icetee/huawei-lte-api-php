<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class OnlineUpdate extends AbstractEndpoint implements OnlineUpdateInterface
{
    public function checkNewVersion(): ResponseInterface
    {
        return $this->connection->get('online-update/check-new-version');
    }

    public function setCheckNewVersion(): ResponseInterface
    {
        return $this->connection->post('online-update/check-new-version', []);
    }

    public function status(): ResponseInterface
    {
        return $this->connection->get('online-update/status');
    }

    public function urlList(): ResponseInterface
    {
        return $this->connection->get('online-update/url-list');
    }

    public function ackNewversion(): ResponseInterface
    {
        return $this->connection->get('online-update/ack-newversion');
    }

    public function setAckNewversion(): ResponseInterface
    {
        return $this->connection->post('online-update/ack-newversion', [
            'userAckNewVersion' => 0,
        ]);
    }

    /**
     * Invoking this method is known to cause some devices to reboot.
     */
    public function cancelDownloading(): ResponseInterface
    {
        return $this->connection->get('online-update/cancel-downloading');
    }

    public function setCancelDownloading(): ResponseInterface
    {
        return $this->connection->post('online-update/cancel-downloading', []);
    }

    public function upgradeMessagebox(): ResponseInterface
    {
        return $this->connection->get('online-update/upgrade-messagebox');
    }

    public function setUpgradeMessagebox(string $messagebox): ResponseInterface
    {
        return $this->connection->post('online-update/upgrade-messagebox', [
            'messagebox' => $messagebox,
        ]);
    }

    public function configuration(): ResponseInterface
    {
        return $this->connection->get('online-update/configuration');
    }

    public function autoupdateConfig(): ResponseInterface
    {
        return $this->connection->get('online-update/autoupdate-config');
    }

    public function redirectCancel(): ResponseInterface
    {
        return $this->connection->get('online-update/redirect_cancel');
    }
}
