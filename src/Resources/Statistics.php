<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class Statistics extends Resource
{
    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function usage(array $query = []): array
    {
        return $this->client->get($this->endpoint . '/usage', $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function bandwidth(array $query = []): array
    {
        return $this->client->get($this->endpoint . '/bandwidth', $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function listeners(array $query = []): array
    {
        return $this->client->get($this->endpoint . '/listeners', $query);
    }
}
