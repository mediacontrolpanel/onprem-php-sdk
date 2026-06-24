<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class System extends Resource
{
    /**
     * @return array<string, mixed>
     */
    public function status(): array
    {
        return $this->client->get($this->endpoint . '/status');
    }

    /**
     * @return array<string, mixed>
     */
    public function health(): array
    {
        return $this->client->get($this->endpoint . '/health');
    }

    /**
     * @return array<string, mixed>
     */
    public function version(): array
    {
        return $this->client->get($this->endpoint . '/version');
    }
}
