# Playlist Tracks

Access playlist track assignment endpoints through:

```php
$playlistTracks = $mediacp->playlistTracks();
```

### `list(string|int $serverId, string|int $playlistId, array $query = []): array`

```php
$tracks = $mediacp->playlistTracks()->list(237, 87, ['type' => 'audio']);
```

### `update(string|int $serverId, string|int $playlistId, array $payload, array $query = []): array`

```php
$tracks = $mediacp->playlistTracks()->update(
    237,
    15,
    ['tracks' => [1, 2, 3]],
    ['type' => 'audio']
);
```
