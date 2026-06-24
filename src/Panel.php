<?php

declare(strict_types=1);

namespace MediaCP;

use GuzzleHttp\ClientInterface;
use MediaCP\Http\Client;
use MediaCP\Resources\Accounts;
use MediaCP\Resources\Servers;
use MediaCP\Resources\Services;
use MediaCP\Resources\Statistics;
use MediaCP\Resources\System;
use MediaCP\Resources\Users;

class Panel
{
    private readonly Client $client;

    /**
     * @param array<string, mixed>|Client $config
     */
    public function __construct(array|Client $config, ?ClientInterface $httpClient = null)
    {
        $this->client = $config instanceof Client ? $config : new Client($config, $httpClient);
    }

    public function client(): Client
    {
        return $this->client;
    }

    public function accounts(): Accounts
    {
        return new Accounts($this->client, 'accounts');
    }

    public function servers(): Servers
    {
        return new Servers($this->client, 'servers');
    }

    public function services(): Services
    {
        return new Services($this->client, 'services');
    }

    public function statistics(): Statistics
    {
        return new Statistics($this->client, 'statistics');
    }

    public function system(): System
    {
        return new System($this->client, 'system');
    }

    public function users(): Users
    {
        return new Users($this->client, 'users');
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function get(string $uri, array $query = []): array
    {
        return $this->client->get($uri, $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function post(string $uri, array $payload = [], array $query = []): array
    {
        return $this->client->post($uri, $payload, $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function put(string $uri, array $payload = [], array $query = []): array
    {
        return $this->client->put($uri, $payload, $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function patch(string $uri, array $payload = [], array $query = []): array
    {
        return $this->client->patch($uri, $payload, $query);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function delete(string $uri, array $query = []): array
    {
        return $this->client->delete($uri, $query);
    }
}
