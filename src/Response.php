<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI;

use JsonSerializable;
use SimpleXMLElement;

use function is_array;
use function json_decode;
use function json_encode;

class Response implements ResponseInterface, JsonSerializable
{
    public function __construct(
        private SimpleXMLElement $xmlContent
    ) {
        $this->xmlContent = $xmlContent;
    }

    public function getXmlContent(): SimpleXMLElement
    {
        return $this->xmlContent;
    }

    public function getArrayContent(): array
    {
        $parsedContent = $this->processResponseXml($this->xmlContent);

        if (is_array($parsedContent)) {
            return $parsedContent;
        }

        return [];
    }

    public function jsonSerialize(): mixed
    {
        return $this->processResponseXml($this->xmlContent);
    }

    private function processResponseXml(SimpleXMLElement $xml): mixed
    {
        return json_decode(json_encode($xml), true);
    }
}
