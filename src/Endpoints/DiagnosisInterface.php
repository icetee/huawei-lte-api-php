<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

interface DiagnosisInterface
{
    public function traceRouteResult(): ResponseInterface;

    public function diagnosePing(): ResponseInterface;

    public function setDiagnosePing(string $host, int $timeout = 4000): ResponseInterface;

    public function diagnoseTraceroute(): ResponseInterface;

    public function setDiagnoseTraceroute(string $host, int $timeout = 4000, int $maxHopCount = 30): ResponseInterface;

    public function timeReboot(): ResponseInterface;
}
