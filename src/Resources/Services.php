<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class Services extends Resource
{
    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function start(string|int $id, array $payload = []): array
    {
        return $this->client->post($this->endpoint . '/' . rawurlencode((string) $id) . '/start', $payload);
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function stop(string|int $id, array $payload = []): array
    {
        return $this->client->post($this->endpoint . '/' . rawurlencode((string) $id) . '/stop', $payload);
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function restart(string|int $id, array $payload = []): array
    {
        return $this->client->post($this->endpoint . '/' . rawurlencode((string) $id) . '/restart', $payload);
    }
}
