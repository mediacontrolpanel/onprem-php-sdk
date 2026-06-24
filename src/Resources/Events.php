<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class Events extends Resource
{
    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function list(string|int $serverId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'event', 'list'), $query);
    }

    /**
     * @return array<string, mixed>
     */
    public function show(string|int $serverId, string|int $eventId): array
    {
        return $this->postForm($this->apiPath($serverId, 'event', 'show', $eventId));
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function create(string|int $serverId, array $payload): array
    {
        return $this->postForm($this->apiPath($serverId, 'event', 'create'), $payload);
    }

    /**
     * @return array<string, mixed>
     */
    public function duplicate(string|int $serverId, string|int $eventId): array
    {
        return $this->postForm($this->apiPath($serverId, 'event', 'copy', $eventId));
    }

    /**
     * @return array<string, mixed>
     */
    public function delete(string|int $serverId, string|int $eventId): array
    {
        return $this->deleteRequest($this->apiPath($serverId, 'event', 'delete', $eventId));
    }
}
