<?php

declare(strict_types=1);

(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('The API script use only command line');

function apiExceptionHandler($exception)
{
    echo json_encode([
        'code'    => $exception->getCode(),
        'message' => $exception->getMessage(),
    ]);
}

set_exception_handler('apiExceptionHandler');

include dirname(__FILE__, 2) . '/vendor/autoload.php';

use Icetee\HuaweiAPI\Connection;
use Icetee\HuaweiAPI\Options\ConnectionOptions;

$connectionOptions = new ConnectionOptions();
$connectionOptions->setUrl($_ENV['HUAWEI_API_URL']);
$connectionOptions->setPassword($_ENV['HUAWEI_API_PASSWORD']);
$connectionOptions->setUsername($_ENV['HUAWEI_API_USERNAME']);

$connection = new Connection($connectionOptions);

$arguments = $argv;

$className = "Icetee\HuaweiAPI\\" . $arguments[1];

if (! class_exists($className)) {
    throw new Exception("No exists " . $className . " class", 500);
}

$endpoint = new $className($connection);

if (! method_exists($endpoint, $arguments[2])) {
    throw new Exception("No exists " . $arguments[2] . " method in " . $className . " class", 500);
}

$arguments = $argv;
$fnArguments = array_slice($arguments, 3);

foreach ($fnArguments as $fnArgumentKey => $fnArgument) {
    if (preg_match('/^a\[]=.*$/', $fnArgument)) {
        parse_str(str_replace('+', '%2B', $fnArgument), $parsed);

        $fnArguments[$fnArgumentKey] = $parsed["a"];
    }
}

$result = $endpoint->{$arguments[2]}(...$fnArguments);

echo json_encode($result);
