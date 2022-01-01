<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Options;

use function substr;

class ConnectionOptions implements ConnectionOptionsInterface
{
    private string $url;
    private string $username = 'admin';
    private string $password;
    private float $timeout = 2.0;
    private bool $isDebug = false;

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        if (substr($url, -1) !== '/') {
            $url .= '/';
        }

        $this->url = $url;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getTimeout(): float
    {
        return $this->timeout;
    }

    public function setTimeout(string $timeout): void
    {
        $this->timeout = $timeout;
    }

    public function getIsDebug(): bool
    {
        return $this->isDebug;
    }

    public function setIsDebug(bool $isDebug): void
    {
        $this->isDebug = $isDebug;
    }
}
