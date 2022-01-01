<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI;

use Icetee\HuaweiAPI\Options\ConnectionOptionsInterface;
use Icetee\HuaweiAPI\ResponseInterface;

interface ConnectionInterface
{
    public function __construct(ConnectionOptionsInterface $options);

    public function get(string $endpoint, array $params = [], string $prefix = 'api'): ResponseInterface;

    public function post(string $endpoint, array $data, bool $refreshCsrf = false, string $prefix = 'api'): ResponseInterface;

    public function postFile(string $endpoint, string $filePath, ?array $data = null, string $prefix = 'api');

    public function getOptions(): ConnectionOptionsInterface;
}
