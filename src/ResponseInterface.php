<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI;

use SimpleXMLElement;

interface ResponseInterface
{
    public function __construct(SimpleXMLElement $content);

    public function getXmlContent(): SimpleXMLElement;

    public function getArrayContent(): array;
}
