<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Options;

interface ConnectionOptionsInterface
{
    public function getUrl(): string;

    public function setUrl(string $url): void;

    public function getUsername(): string;

    public function setUsername(string $username): void;

    public function getPassword(): string;

    public function setPassword(string $password): void;

    public function getTimeout(): float;

    public function setTimeout(string $timeout): void;

    public function getIsDebug(): bool;

    public function setIsDebug(bool $isDebug): void;
}
