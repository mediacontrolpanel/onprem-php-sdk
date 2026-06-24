<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class Services extends Resource
{
    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function list(array $query = []): array
    {
        return $this->get($this->adminPath('media-service', 'list'), $query);
    }

    /**
     * @return array<string, mixed>
     */
    public function show(string|int $serverId): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'show'));
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function create(string|int $serverId, array $payload): array
    {
        return $this->postForm($this->apiPath($serverId, 'media-service', 'store'), $payload);
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function update(string|int $serverId, array $payload): array
    {
        return $this->postForm($this->apiPath($serverId, 'media-service', 'update'), $payload);
    }

    /**
     * @return array<string, mixed>
     */
    public function delete(string|int $serverId): array
    {
        return $this->deleteRequest($this->apiPath($serverId, 'media-service', 'delete'));
    }

    /**
     * @return array<string, mixed>
     */
    public function start(string|int $serverId): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'start-service'));
    }

    /**
     * @return array<string, mixed>
     */
    public function stop(string|int $serverId): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'stop-service'));
    }

    /**
     * @return array<string, mixed>
     */
    public function restart(string|int $serverId): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'restart-service'));
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function suspend(string|int $serverId, array $payload = []): array
    {
        return $this->postForm($this->apiPath($serverId, 'media-service', 'suspend'), $payload);
    }

    /**
     * @return array<string, mixed>
     */
    public function unsuspend(string|int $serverId): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'unsuspend'));
    }

    /**
     * @return array<string, mixed>
     */
    public function updateSongTitle(string|int $serverId, string $title): array
    {
        return $this->postForm($this->apiPath($serverId, 'media-service', 'update-song-title'), [
            'title' => $title,
        ]);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function serviceInfo(string|int $serverId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'serviceInfo'), $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function connections(string|int $serverId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'connections'), $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function trackHistory(string|int $serverId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'trackHistory'), $query);
    }

    /**
     * @return array<string, mixed>
     */
    public function bandwidthHistory(string|int $serverId): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'bandwidthHistory'));
    }

    /**
     * @return array<string, mixed>
     */
    public function connectionHistory(string|int $serverId): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'connectionHistory'));
    }
}
