<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class Statistics extends Resource
{
    /**
     * @return array<string, mixed>
     */
    public function summary(): array
    {
        return $this->get($this->adminPath('Statistics'));
    }
}
