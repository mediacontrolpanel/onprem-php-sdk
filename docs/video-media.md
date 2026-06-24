# Video Media

Access video media endpoints through:

```php
$videoMedia = $mediacp->videoMedia();
```

### `list(string|int $serverId, array $query = []): array`

```php
$files = $mediacp->videoMedia()->list(13, ['page' => 1]);
```

### `upload(string|int $serverId, array $payload): array`

```php
$upload = $mediacp->videoMedia()->upload(13, [
    'url' => 'http://mirror.mediacp.net/download/common/sample.mp4',
    'path' => '/Test',
]);
```

### `delete(string|int $serverId, array $query): array`

```php
$mediacp->videoMedia()->delete(13, ['filename' => 'sample.mp4']);
```
