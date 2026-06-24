# Media

Access audio media file endpoints through:

```php
$media = $mediacp->media();
```

### `list(string|int $serverId, array $query = []): array`

```php
$files = $mediacp->media()->list(13, ['path' => '/', 'page' => 1]);
```

### `upload(string|int $serverId, array $payload): array`

```php
$upload = $mediacp->media()->upload(13, [
    'url' => 'https://example.com/audio.mp3',
    'path' => '/Ads',
]);
```

### `updateTrack(string|int $serverId, array $payload): array`

```php
$track = $mediacp->media()->updateTrack(13, [
    'track_id' => 1,
    'title' => 'Updated title',
]);
```

### `createFolder(string|int $serverId, array $query): array`

```php
$folder = $mediacp->media()->createFolder(13, [
    'title' => 'Ads',
    'path' => '/',
]);
```

### `renameFolder(string|int $serverId, array $query): array`

```php
$folder = $mediacp->media()->renameFolder(13, [
    'path' => '/Ads',
    'title' => 'Spots',
]);
```

### `move(string|int $serverId, array $query): array`

```php
$media = $mediacp->media()->move(13, [
    'tracks[0]' => 1,
    'moveToPath' => '/Ads',
]);
```

### `delete(string|int $serverId, array $query): array`

```php
$mediacp->media()->delete(13, ['tracks[0]' => 1]);
```
