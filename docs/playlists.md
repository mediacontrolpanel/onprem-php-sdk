# Playlist

Access audio and on-demand playlist endpoints through:

```php
$playlists = $mediacp->playlists();
```

### `listAudio(string|int $serverId, array $query = []): array`

```php
$playlists = $mediacp->playlists()->listAudio(237, ['page' => 1]);
```

### `showAudio(string|int $serverId, string|int $playlistId, array $query = []): array`

```php
$playlist = $mediacp->playlists()->showAudio(237, 12, ['type' => 'audio']);
```

### `createAudio(string|int $serverId, array $payload): array`

```php
$playlist = $mediacp->playlists()->createAudio(237, ['title' => 'Rotation']);
```

### `duplicateAudio(string|int $serverId, string|int $playlistId): array`

```php
$playlist = $mediacp->playlists()->duplicateAudio(237, 87);
```

### `deleteAudio(string|int $serverId, string|int $playlistId): array`

```php
$mediacp->playlists()->deleteAudio(237, 93);
```

### `listOnDemand(string|int $serverId, array $query = []): array`

```php
$playlists = $mediacp->playlists()->listOnDemand(237, ['search' => 'movies']);
```

### `showOnDemand(string|int $serverId, string|int $playlistId, array $query = []): array`

```php
$playlist = $mediacp->playlists()->showOnDemand(237, 2);
```

### `availableOnDemandTracks(string|int $serverId, string|int $playlistId, array $query = []): array`

```php
$tracks = $mediacp->playlists()->availableOnDemandTracks(237, 2, ['search' => 'intro']);
```

### `createOnDemand(string|int $serverId, array $payload): array`

```php
$playlist = $mediacp->playlists()->createOnDemand(237, ['title' => 'On Demand']);
```

### `updateOnDemand(string|int $serverId, string|int $playlistId, array $payload): array`

```php
$playlist = $mediacp->playlists()->updateOnDemand(237, 3, ['title' => 'Updated']);
```

### `deleteOnDemand(string|int $serverId, string|int $playlistId): array`

```php
$mediacp->playlists()->deleteOnDemand(237, 3);
```
