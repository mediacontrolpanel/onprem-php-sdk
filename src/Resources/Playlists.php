<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class Playlists extends Resource
{
    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function listAudio(string|int $serverId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'audio-playlist', 'list'), $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function showAudio(string|int $serverId, string|int $playlistId, array $query = []): array
    {
        return $this->postForm($this->apiPath($serverId, 'audio-playlist', 'show', $playlistId), [], $query);
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function createAudio(string|int $serverId, array $payload): array
    {
        return $this->postForm($this->apiPath($serverId, 'audio-playlist', 'create'), $payload);
    }

    /**
     * @return array<string, mixed>
     */
    public function duplicateAudio(string|int $serverId, string|int $playlistId): array
    {
        return $this->postForm($this->apiPath($serverId, 'audio-playlist', 'copy', $playlistId));
    }

    /**
     * @return array<string, mixed>
     */
    public function deleteAudio(string|int $serverId, string|int $playlistId): array
    {
        return $this->deleteRequest($this->apiPath($serverId, 'audio-playlist', 'delete', $playlistId));
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function listOnDemand(string|int $serverId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'ondemand-playlist', 'index'), $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function showOnDemand(string|int $serverId, string|int $playlistId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'ondemand-playlist', 'show', $playlistId), $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function availableOnDemandTracks(string|int $serverId, string|int $playlistId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'ondemand-playlist', 'availableTracks', $playlistId), $query);
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function createOnDemand(string|int $serverId, array $payload): array
    {
        return $this->postForm($this->apiPath($serverId, 'ondemand-playlist', 'store'), $payload);
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function updateOnDemand(string|int $serverId, string|int $playlistId, array $payload): array
    {
        return $this->postForm($this->apiPath($serverId, 'ondemand-playlist', 'update', $playlistId), $payload);
    }

    /**
     * @return array<string, mixed>
     */
    public function deleteOnDemand(string|int $serverId, string|int $playlistId): array
    {
        return $this->deleteRequest($this->apiPath($serverId, 'ondemand-playlist', 'delete', $playlistId));
    }
}
