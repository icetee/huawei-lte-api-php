<?php

declare(strict_types=1);

/**
 *  Example code on how to send a SMS, you can try it by running:
 *  php send_sms.php http://admin:PASSWORD@192.168.8.1 "+420123456788,+420123456789" "Hello world"
 */

include dirname(__FILE__, 2) . '/vendor/autoload.php';

use Icetee\HuaweiAPI\Connection;
use Icetee\HuaweiAPI\Options\ConnectionOptions;
use Icetee\HuaweiAPI\Endpoints;
use Icetee\HuaweiAPI\Enums\ApiResponseEnum;

preg_match('/(https?:\/\/)(.*):(.*)@(.*)/', $argv[1], $options);

$phoneNumbers = explode(';', str_replace(',', ';', $argv[2]));

$connectionOptions = new ConnectionOptions();
$connectionOptions->setUrl($options[1] . $options[4]);
$connectionOptions->setUsername($options[2]);
$connectionOptions->setPassword($options[3]);

$connection = new Connection($connectionOptions);

$sms = new Endpoints\Sms($connection);

$response = $sms->sendSms($phoneNumbers, $argv[3]);

if ($response->getXmlContent()->__toString() === ApiResponseEnum::OK->value) {
    echo "SMS was send successfully";
} else {
    echo "Error";
}
