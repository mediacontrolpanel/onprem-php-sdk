<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class Media extends Resource
{
    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function list(string|int $serverId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'media', 'list'), $query);
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function upload(string|int $serverId, array $payload): array
    {
        return $this->postForm($this->apiPath($serverId, 'media', 'upload'), $payload);
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function updateTrack(string|int $serverId, array $payload): array
    {
        return $this->postForm($this->apiPath($serverId, 'media', 'updateTrack'), $payload);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function createFolder(string|int $serverId, array $query): array
    {
        return $this->get($this->apiPath($serverId, 'media', 'createFolder'), $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function renameFolder(string|int $serverId, array $query): array
    {
        return $this->get($this->apiPath($serverId, 'media', 'renameFolder'), $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function move(string|int $serverId, array $query): array
    {
        return $this->get($this->apiPath($serverId, 'media', 'renameFolder'), $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function delete(string|int $serverId, array $query): array
    {
        return $this->deleteRequest($this->apiPath($serverId, 'media', 'delete'), $query);
    }
}
