<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class Djs extends Resource
{
    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function list(string|int $serverId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'dj', 'list'), $query);
    }

    /**
     * @return array<string, mixed>
     */
    public function show(string|int $serverId, string|int $djId): array
    {
        return $this->get($this->apiPath($serverId, 'dj', 'show', $djId));
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function create(string|int $serverId, array $payload): array
    {
        return $this->postForm($this->apiPath($serverId, 'dj', 'store'), $payload);
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function update(string|int $serverId, string|int $djId, array $payload): array
    {
        return $this->postForm($this->apiPath($serverId, 'dj', 'update', $djId), $payload);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function delete(string|int $serverId, string|int $djId, array $query = []): array
    {
        return $this->deleteRequest($this->apiPath($serverId, 'dj', 'delete', $djId), $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function enable(string|int $serverId, string|int $djId, array $query = []): array
    {
        return $this->patchForm($this->apiPath($serverId, 'dj', 'enable', $djId), [], $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function disable(string|int $serverId, string|int $djId, array $query = []): array
    {
        return $this->patchForm($this->apiPath($serverId, 'dj', 'disable', $djId), [], $query);
    }
}
