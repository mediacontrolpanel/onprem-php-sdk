<?php

declare(strict_types=1);

namespace MediaCP\Resources;

class Users extends Resource
{
    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function list(array $query = []): array
    {
        return $this->get($this->adminPath('user', 'list'), $query);
    }

    /**
     * @return array<string, mixed>
     */
    public function show(string|int $userId): array
    {
        return $this->get($this->adminPath('user', 'show', $userId));
    }

    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    public function create(array $payload): array
    {
        return $this->postForm($this->adminPath('user', 'store'), $payload);
    }

    /**
     * @return array<string, mixed>
     */
    public function delete(string|int $userId): array
    {
        return $this->deleteRequest($this->adminPath('user', 'delete', $userId));
    }
}
