<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class StreamTargets extends Resource
{
    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function list(string|int $serverId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'stream-targets', 'list'), $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function show(string|int $serverId, string|int $targetId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'stream-targets', 'show', $targetId), $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function status(string|int $serverId, string|int $targetId, array $query = []): array
    {
        return $this->get($this->apiPath($serverId, 'stream-targets', 'status', $targetId), $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function connect(string|int $serverId, string|int $targetId, array $query = []): array
    {
        return $this->patchForm($this->apiPath($serverId, 'stream-targets', 'connect', $targetId), [], $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function disconnect(string|int $serverId, string|int $targetId, array $query = []): array
    {
        return $this->patchForm($this->apiPath($serverId, 'stream-targets', 'disconnect', $targetId), [], $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function delete(string|int $serverId, string|int $targetId, array $query = []): array
    {
        return $this->deleteRequest($this->apiPath($serverId, 'stream-targets', 'delete', $targetId), $query);
    }
}
