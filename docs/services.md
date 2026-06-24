# Service

Access service endpoints through:

```php
$services = $mediacp->services();
```

### `list(array $query = []): array`

```php
$services = $mediacp->services()->list(['user_id' => 1, 'page' => 1]);
```

### `show(string|int $serverId): array`

```php
$service = $mediacp->services()->show(237);
```

### `create(string|int $serverId, array $payload): array`

```php
$service = $mediacp->services()->create(237, [
    'userid' => 1,
    'plugin' => 'icecast_kh',
    'sourceplugin' => 'liquidsoap',
    'unique_id' => 'My New Service',
    'adminpassword' => 'test123',
    'maxuser' => 500,
]);
```

### `update(string|int $serverId, array $payload): array`

```php
$service = $mediacp->services()->update(237, ['maxuser' => 500]);
```

### `delete(string|int $serverId): array`

```php
$mediacp->services()->delete(237);
```

### `start(string|int $serverId): array`

```php
$mediacp->services()->start(237);
```

### `stop(string|int $serverId): array`

```php
$mediacp->services()->stop(237);
```

### `restart(string|int $serverId): array`

```php
$mediacp->services()->restart(237);
```

### `suspend(string|int $serverId, array $payload = []): array`

```php
$mediacp->services()->suspend(237, ['reason' => 'Billing hold', 'days' => 7]);
```

### `unsuspend(string|int $serverId): array`

```php
$mediacp->services()->unsuspend(237);
```

### `updateSongTitle(string|int $serverId, string $title): array`

```php
$mediacp->services()->updateSongTitle(237, 'New Song title');
```

### `serviceInfo(string|int $serverId, array $query = []): array`

```php
$mediacp->services()->serviceInfo(237, ['extra' => true]);
```

### `connections(string|int $serverId, array $query = []): array`

```php
$mediacp->services()->connections(237, ['page' => 1]);
```

### `trackHistory(string|int $serverId, array $query = []): array`

```php
$mediacp->services()->trackHistory(237, ['limit' => 25]);
```

### `bandwidthHistory(string|int $serverId): array`

```php
$mediacp->services()->bandwidthHistory(237);
```

### `connectionHistory(string|int $serverId): array`

```php
$mediacp->services()->connectionHistory(237);
```
