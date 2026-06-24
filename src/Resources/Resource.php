<?php

declare(strict_types=1);

namespace MediaCP\Resources;

use MediaCP\Http\Client;

abstract class Resource
{
    public function __construct(
        protected readonly Client $client,
        protected readonly string $endpoint
    ) {
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function list(array $query = []): array
    {
        return $this->client->get($this->endpoint, $query);
    }

    /**
     * @param string|int $id
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function get(string|int $id, array $query = []): array
    {
        return $this->client->get($this->endpoint . '/' . rawurlencode((string) $id), $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function create(array $payload, array $query = []): array
    {
        return $this->client->post($this->endpoint, $payload, $query);
    }

    /**
     * @param string|int $id
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function update(string|int $id, array $payload, array $query = []): array
    {
        return $this->client->put($this->endpoint . '/' . rawurlencode((string) $id), $payload, $query);
    }

    /**
     * @param string|int $id
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function patch(string|int $id, array $payload, array $query = []): array
    {
        return $this->client->patch($this->endpoint . '/' . rawurlencode((string) $id), $payload, $query);
    }

    /**
     * @param string|int $id
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function delete(string|int $id, array $query = []): array
    {
        return $this->client->delete($this->endpoint . '/' . rawurlencode((string) $id), $query);
    }
}
