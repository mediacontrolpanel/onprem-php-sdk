<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class Servers extends Resource
{
    /**
     * @return array<string, mixed>
     */
    public function status(string|int $id): array
    {
        return $this->client->get($this->endpoint . '/' . rawurlencode((string) $id) . '/status');
    }
}
