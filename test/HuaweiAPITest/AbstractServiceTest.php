<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPITest;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

abstract class AbstractServiceTest extends TestCase
{
    /** @var ContainerInterface */
    protected static Client $client;

    public static function setUpBeforeClass(): void
    {
        static::initContainer();
    }

    protected static function initContainer(): void
    {
        static::$client = new Client([
            'base_uri'   => 'http://192.168.8.1',
            'exceptions' => false,
        ]);
    }
}
