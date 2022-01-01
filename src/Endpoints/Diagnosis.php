<?php

declare(strict_types=1);

namespace Icetee\HuaweiAPI\Endpoints;

use Icetee\HuaweiAPI\ResponseInterface;

final class Diagnosis extends AbstractEndpoint implements DiagnosisInterface
{
    public function traceRouteResult(): ResponseInterface
    {
        return $this->connection->get('diagnosis/tracerouteresult');
    }

    public function diagnosePing(): ResponseInterface
    {
        return $this->connection->get('diagnosis/diagnose_ping');
    }

    public function setDiagnosePing(string $host, int $timeout = 4000): ResponseInterface
    {
        return $this->connection->post('diagnosis/diagnose_ping', [
            'Host'    => $host,
            'Timeout' => $timeout,
        ]);
    }

    public function diagnoseTraceroute(): ResponseInterface
    {
        return $this->connection->get('diagnosis/diagnose_traceroute');
    }

    public function setDiagnoseTraceroute(string $host, int $timeout = 4000, int $maxHopCount = 30): ResponseInterface
    {
        return $this->connection->post('diagnosis/diagnose_ping', [
            'Host'        => $host,
            'MaxHopCount' => $maxHopCount,
            'Timeout'     => $timeout,
        ]);
    }

    public function timeReboot(): ResponseInterface
    {
        return $this->connection->get('diagnosis/time_reboot');
    }
}
