# huawei-lte-api-php

API for Huawei LAN/WAN LTE Modems rewritten from [original Python library](https://github.com/Salamek/huawei-lte-api) into PHP you can use this to simply send SMS, get information about your internet usage, signal, and tons of other stuff

### Tested on:
#### 3G/LTE Routers:
* Huawei B310s-22
* Huawei B315s-22
* Huawei B525s-23a
* Huawei B525s-65a
* Huawei B715s-23c
* Huawei B528s
* Huawei B535-232
* Huawei B628-265
* Huawei B818-263
* Huawei E5186s-22a
* Huawei E5576-320
* Huawei E5577Cs-321

#### 3G/LTE USB sticks:
(Device must support NETWork mode aka. "HiLink" version, it wont work with serial mode)
* Huawei E3131
* Huawei E3372
* Huawei E3531

#### 5G Routers:
* Huawei 5G CPE Pro 2 (H122-373)

(probably will work for other Huawei LTE devices too)

### Will NOT work on:
#### LTE Routers:
* Huawei B2368-22 (Incompatible firmware, testing device needed!)
* Huawei B593s-22 (Incompatible firmware, testing device needed!)

## Installation

### composer
```bash
$ composer require icetee/huawei-lte-api-php
```

## Usage
```php
<?php

declare(strict_types=1);

include 'vendor/autoload.php';

use Icetee\HuaweiAPI\Connection;
use Icetee\HuaweiAPI\Options\ConnectionOptions;
use Icetee\HuaweiAPI\Endpoints\Sms;

$connectionOptions = new ConnectionOptions();
$connectionOptions->setUrl('http://192.168.8.1');
$connectionOptions->setUsername('admin');
$connectionOptions->setPassword('YOUR_PASSWORD');

$connection = new Connection($connectionOptions);

$device = new Device($connection);

echo json_encode($device->information());
```

## Send SMS

```php
<?php

declare(strict_types=1);

include 'vendor/autoload.php';

use Icetee\HuaweiAPI\Connection;
use Icetee\HuaweiAPI\Enums\ApiResponseEnum;
use Icetee\HuaweiAPI\Options\ConnectionOptions;
use Icetee\HuaweiAPI\Endpoints\Sms;

$connectionOptions = new ConnectionOptions();
$connectionOptions->setUrl('http://192.168.8.1');
$connectionOptions->setUsername('admin');
$connectionOptions->setPassword('admin');

$connection = new Connection($connectionOptions);

$sms = new Sms($connection);

$response = $sms->sendSms(['+48123456789'], 'message');

if ($response->getXmlContent()->__toString() === ApiResponseEnum::OK->value) {
    echo "Success";
} else {
    echo "Error";
}
```

## Get SMS list

```php
<?php

declare(strict_types=1);

include 'vendor/autoload.php';

use Icetee\HuaweiAPI\Connection;
use Icetee\HuaweiAPI\Options\ConnectionOptions;
use Icetee\HuaweiAPI\Endpoints\Sms;

$connectionOptions = new ConnectionOptions();
$connectionOptions->setUrl('http://192.168.8.1');
$connectionOptions->setUsername('admin');
$connectionOptions->setPassword('admin');

$connection = new Connection($connectionOptions);

$sms = new Sms($connection);

$response = $sms->getSmsList();

$inbox = $response->getXmlContent();

var_dump($inbox);
```

## Use with Docker (BETA)

NOTICE: It is in development. Simple calls have been resolved for now. Complex parameters such as DateTime, Enum are not resolved.

The entry point for the docker is the `docker/api.php` file. The first parameter is the name of the class. The second parameter is the method name of the class. Everything else is a parameter of the method.

```
docker run --env HUAWEI_API_PASSWORD=__PASSWORD__ --rm icetee/huawei-lte-api-php:latest Endpoints\Device informations
```

Examples:
- Endpoints\\Device informations
- Config\\Device config
- Endpoints\\Sms sendSms 'a[]=+420123456788' "Hello World!"
- Endpoints\\Sms sendSms 'a[]=+420123456788&a[]=+420123456789' "Hello World! Multi phone number."

## Develop

```
docker build -f Dockerfile.dev --tag huawei-lte-api-php:latest .
```

```
docker run -it --rm -v $(pwd):/app huawei-lte-api-php:latest sh
```
