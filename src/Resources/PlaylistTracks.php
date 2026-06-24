<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class PlaylistTracks extends Resource
{
    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function list(string|int $serverId, string|int $playlistId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'playlist-track', 'list', $playlistId), $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function update(string|int $serverId, string|int $playlistId, array $payload, array $query = []): array
    {
        return $this->postForm($this->apiPath($serverId, 'playlist-track', 'update', $playlistId), $payload, $query);
    }
}
