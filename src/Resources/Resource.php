<?php

declare(strict_types=1);

namespace MediaCP\Resources;

use MediaCP\Http\Client;

abstract class Resource
{
    public function __construct(protected readonly Client $client)
    {
    }

    /**
     * @param string|int $serverId
     * @param string|int ...$segments
     */
    protected function apiPath(string|int $serverId, string|int ...$segments): string
    {
        $encoded = array_map(
            static fn (string|int $segment): string => rawurlencode((string) $segment),
            array_merge([$serverId], $segments)
        );

        return 'api/' . implode('/', $encoded);
    }

    /**
     * @param string|int ...$segments
     */
    protected function adminPath(string|int ...$segments): string
    {
        return $this->apiPath(0, ...$segments);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    protected function get(string $uri, array $query = []): array
    {
        return $this->client->get($uri, $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    protected function postForm(string $uri, array $payload = [], array $query = []): array
    {
        return $this->client->postForm($uri, $payload, $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    protected function patchForm(string $uri, array $payload = [], array $query = []): array
    {
        return $this->client->patchForm($uri, $payload, $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    protected function deleteRequest(string $uri, array $query = []): array
    {
        return $this->client->delete($uri, $query);
    }
}
