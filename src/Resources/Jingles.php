<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class Jingles extends Resource
{
    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function list(string|int $serverId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'audio-playlist', 'list'), $query);
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function create(string|int $serverId, array $payload): array
    {
        return $this->postForm($this->apiPath($serverId, 'jingle', 'create'), $payload);
    }

    /**
     * @return array<string, mixed>
     */
    public function duplicate(string|int $serverId, string|int $jingleId): array
    {
        return $this->postForm($this->apiPath($serverId, 'jingle', 'copy', $jingleId));
    }

    /**
     * @return array<string, mixed>
     */
    public function delete(string|int $serverId, string|int $jingleId): array
    {
        return $this->deleteRequest($this->apiPath($serverId, 'jingle', 'delete', $jingleId));
    }
}
