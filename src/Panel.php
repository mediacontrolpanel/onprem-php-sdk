<?php

declare(strict_types=1);

namespace MediaCP;

use GuzzleHttp\ClientInterface;
use MediaCP\Http\Client;
use MediaCP\Resources\AutoDj;
use MediaCP\Resources\Djs;
use MediaCP\Resources\Events;
use MediaCP\Resources\Jingles;
use MediaCP\Resources\Media;
use MediaCP\Resources\Playlists;
use MediaCP\Resources\PlaylistTracks;
use MediaCP\Resources\Services;
use MediaCP\Resources\SourceControl;
use MediaCP\Resources\Statistics;
use MediaCP\Resources\StreamEvents;
use MediaCP\Resources\StreamTargets;
use MediaCP\Resources\Users;
use MediaCP\Resources\VideoMedia;

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

    public function autoDj(): AutoDj
    {
        return new AutoDj($this->client);
    }

    public function djs(): Djs
    {
        return new Djs($this->client);
    }

    public function events(): Events
    {
        return new Events($this->client);
    }

    public function jingles(): Jingles
    {
        return new Jingles($this->client);
    }

    public function media(): Media
    {
        return new Media($this->client);
    }

    public function playlists(): Playlists
    {
        return new Playlists($this->client);
    }

    public function playlistTracks(): PlaylistTracks
    {
        return new PlaylistTracks($this->client);
    }

    public function services(): Services
    {
        return new Services($this->client);
    }

    public function sourceControl(): SourceControl
    {
        return new SourceControl($this->client);
    }

    public function statistics(): Statistics
    {
        return new Statistics($this->client);
    }

    public function streamEvents(): StreamEvents
    {
        return new StreamEvents($this->client);
    }

    public function streamTargets(): StreamTargets
    {
        return new StreamTargets($this->client);
    }

    public function users(): Users
    {
        return new Users($this->client);
    }

    public function videoMedia(): VideoMedia
    {
        return new VideoMedia($this->client);
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
    public function postForm(string $uri, array $payload = [], array $query = []): array
    {
        return $this->client->postForm($uri, $payload, $query);
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
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function patchForm(string $uri, array $payload = [], array $query = []): array
    {
        return $this->client->patchForm($uri, $payload, $query);
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
