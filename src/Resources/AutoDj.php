<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class AutoDj extends Resource
{
    /**
     * @return array<string, mixed>
     */
    public function skipTrack(string|int $serverId): array
    {
        return $this->get($this->apiPath($serverId, 'media-service', 'skip-track'));
    }
}
