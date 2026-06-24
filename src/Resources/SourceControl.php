<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class SourceControl extends Resource
{
    /**
     * @return array<string, mixed>
     */
    public function start(string|int $serverId): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'startSource'));
    }

    /**
     * @return array<string, mixed>
     */
    public function stop(string|int $serverId): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'stopSource'));
    }

    /**
     * @return array<string, mixed>
     */
    public function restart(string|int $serverId): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'restartSource'));
    }

    /**
     * @return array<string, mixed>
     */
    public function disconnectDj(string|int $serverId): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'disconnectDj'));
    }
}
