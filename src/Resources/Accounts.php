<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class Accounts extends Resource
{
    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function suspend(string|int $id, array $payload = []): array
    {
        return $this->client->post($this->endpoint . '/' . rawurlencode((string) $id) . '/suspend', $payload);
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function unsuspend(string|int $id, array $payload = []): array
    {
        return $this->client->post($this->endpoint . '/' . rawurlencode((string) $id) . '/unsuspend', $payload);
    }
}
