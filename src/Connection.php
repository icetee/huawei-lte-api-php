<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Icetee\HuaweiAPI\Endpoints\User;
use Icetee\HuaweiAPI\Enums\ApiErrorEnum;
use Icetee\HuaweiAPI\Options\ConnectionOptionsInterface;
use Icetee\HuaweiAPI\ResponseInterface;
use SimpleXMLElement;

use function array_shift;
use function count;
use function is_array;
use function preg_match_all;
use function strlen;

final class Connection implements ConnectionInterface
{
    private Client $client;
    private array $requestVerificationTokens = [];

    public function __construct(
        private ConnectionOptionsInterface $options
    ) {
        $this->options = $options;

        $this->client = new Client([
            'base_uri' => $this->options->getUrl(),
            'timeout'  => $this->options->getTimeout(),
            'cookies'  => true,
            'debug'    => $this->options->getIsDebug(),
        ]);

        $this->initializeCsrfTokensAndSession();

        $user = new User($this);
        $user->login(true);
    }

    public function get(string $endpoint, array $params = [], string $prefix = 'api'): ResponseInterface
    {
        $url = $this->buildFinalUrl($prefix, $endpoint);

        $headers = [];

        if (count($this->requestVerificationTokens) === 1) {
            $headers['__RequestVerificationToken'] = $this->requestVerificationTokens[0];
        }

        $response = $this->client->request('GET', $url, [
            'headers' => $headers,
            'query'   => $params,
        ]);

        $xml = new SimpleXMLElement($response->getBody()->getContents());

        $this->checkResponseStatus($xml);

        return new Response($xml);
    }

    public function post(string $endpoint, array $data, bool $refreshCsrf = false, string $prefix = 'api'): ResponseInterface
    {
        $url  = $this->buildFinalUrl($prefix, $endpoint);
        $body = $this->createRequestXml($data);

        $response = $this->client->request('POST', $url, [
            'headers' => $this->getHeaders(),
            'body'    => $body,
        ]);

        $xml = new SimpleXMLElement($response->getBody()->getContents());

        $this->checkResponseStatus($xml);

        if ($refreshCsrf) {
            $this->requestVerificationTokens = [];
        }

        if ($response->getHeader('__RequestVerificationTokenone')) {
            $this->requestVerificationTokens[] = $response->getHeader('__RequestVerificationTokenone')[0];

            if ($response->getHeader('__RequestVerificationTokentwo')) {
                $this->requestVerificationTokens[] = $response->getHeader('__RequestVerificationTokentwo')[0];
            }
        } elseif ($response->getHeader('__RequestVerificationToken')) {
            $this->requestVerificationTokens[] = $response->getHeader('__RequestVerificationToken')[0];
        }

        return new Response($xml);
    }

    public function postFile(string $endpoint, string $filePath, ?array $data = null, string $prefix = 'api'): ResponseInterface
    {
        $url = $this->buildFinalUrl($prefix, $endpoint);

        $response = $this->client->request('POST', $url, [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => Psr7\Utils::tryFopen($filePath, 'r'),
                ],
            ],
            'headers'   => [
                'csrf_token' => $this->requestVerificationTokens[0],
            ],
        ]);

        $xml = new SimpleXMLElement($response->getBody()->getContents());

        $this->checkResponseStatus($xml);

        return new Response($xml);
    }

    public function getRequestVerificationTokens(): array
    {
        return $this->requestVerificationTokens;
    }

    public function getOptions(): ConnectionOptionsInterface
    {
        return $this->options;
    }

    private function getHeaders(): array
    {
        $headers = [
            'Content-Type' => 'application/xml',
        ];

        if (count($this->requestVerificationTokens) > 1) {
            $headers['__RequestVerificationToken'] = array_shift($this->requestVerificationTokens);
        } elseif (count($this->requestVerificationTokens) === 1) {
            $headers['__RequestVerificationToken'] = $this->requestVerificationTokens[0];
        }

        return $headers;
    }

    private function initializeCsrfTokensAndSession(): void
    {
        $this->requestVerificationTokens = [];

        $response = $this->client->request('GET', $this->options->getUrl());

        preg_match_all('/name="csrf_token"\s+content="(\S+)"/', $response->getBody()->getContents(), $tokens);

        foreach ($tokens[1] as $token) {
            $this->requestVerificationTokens[] = $token;
        }

        // If we did not find anything in HTML, lets try to ask API for it
        if (count($this->requestVerificationTokens) === 0) {
            $token = $this->getToken();

            if ($token !== null) {
                $this->requestVerificationTokens[] = $token;
            }
        }
    }

    private function getToken(): ?string
    {
        try {
            $response = $this->get('webserver/token');

            return $response->getXmlContent()->token->__toString();
        } catch (Exception $e) {
            return $this->getSesTokInfo();
        }

        return null;
    }

    private function getSesTokInfo(): ?string
    {
        try {
            $response = $this->get('webserver/SesTokInfo');

            return $response->getXmlContent()->TokInfo->__toString();
        } catch (Exception $e) {
            return null;
        }

        return null;
    }

    private function checkResponseStatus(SimpleXMLElement $dom): void
    {
        $code    = (int) $dom->code->__toString();
        $message = (string) $dom->message->__toString();

        if ($code !== 0) {
            $errorEnum = ApiErrorEnum::tryFrom($code);

            $message = strlen($message) > 0 ? $message : null;

            if ($errorEnum === null) {
                throw new Exceptions\UnknowErrorException((string) $message, $code);
            }

            throw new Exceptions\ApiResponseException($errorEnum, $message);
        }
    }

    private function createRequestXml(array $data): string
    {
        $dom = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><request></request>');

        foreach ($data as $name => $dv) {
            $this->createRequestXmlChild($dom, $name, $dv);
        }

        return $dom->asXML();
    }

    private function createRequestXmlChild(SimpleXMLElement $dom, string $qualifiedName, array|string|int $value)
    {
        if (is_array($value)) {
            $childDom = $dom->addChild($qualifiedName);

            foreach ($value as $dkChild => $dvChild) {
                if (is_array($dvChild)) {
                    foreach ($dvChild as $dvChildValue) {
                        $this->createRequestXmlChild($childDom, $dkChild, $dvChildValue);
                    }
                } else {
                    $childDom->addChild($dkChild, (string) $dvChild);
                }
            }
        } else {
            $dom->addChild($qualifiedName, (string) $value);
        }
    }

    private function buildFinalUrl(string $prefix, string $endpoint): string
    {
        return $prefix . '/' . $endpoint;
    }
}
