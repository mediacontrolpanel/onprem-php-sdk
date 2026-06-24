<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class StreamEvents extends Resource
{
    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function list(array $query = []): array
    {
        return $this->get($this->adminPath('event-log', 'index'), $query);
    }
}
