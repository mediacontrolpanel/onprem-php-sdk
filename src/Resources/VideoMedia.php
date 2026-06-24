<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class VideoMedia extends Resource
{
    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function list(string|int $serverId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'video-media', 'list'), $query);
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function upload(string|int $serverId, array $payload): array
    {
        return $this->postForm($this->apiPath($serverId, 'video-media', 'upload'), $payload);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function delete(string|int $serverId, array $query): array
    {
        return $this->deleteRequest($this->apiPath($serverId, 'video-media', 'delete'), $query);
    }
}
