<?php

declare(strict_types=1);

/**
 *  Example code on how to receive basic info about your router, you can try it by running:
 *  php device_info.php --url http://192.168.8.1 --username admin --password PASSWORD
 */

include dirname(__FILE__, 2) . '/vendor/autoload.php';

use Icetee\HuaweiAPI\Connection;
use Icetee\HuaweiAPI\Options\ConnectionOptions;
use Icetee\HuaweiAPI\Endpoints;

$options = getopt("", [
    'url:',
    'password:',
    'username:',
]);

$connectionOptions = new ConnectionOptions();
$connectionOptions->setUrl($options['url']);
$connectionOptions->setPassword($options['password']);
$connectionOptions->setUsername($options['username']);

$connection = new Connection($connectionOptions);

$device = new Endpoints\Device($connection);

echo json_encode($device->information());
