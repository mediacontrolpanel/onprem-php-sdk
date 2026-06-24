# DJs

Access DJ endpoints through:

```php
$djs = $mediacp->djs();
```

### `list(string|int $serverId, array $query = []): array`

```php
$djs = $mediacp->djs()->list(23);
```

### `show(string|int $serverId, string|int $djId): array`

```php
$dj = $mediacp->djs()->show(23, 3);
```

### `create(string|int $serverId, array $payload): array`

```php
$dj = $mediacp->djs()->create(23, ['username' => 'dj1']);
```

### `update(string|int $serverId, string|int $djId, array $payload): array`

```php
$dj = $mediacp->djs()->update(23, 3, ['username' => 'dj2']);
```

### `delete(string|int $serverId, string|int $djId, array $query = []): array`

```php
$mediacp->djs()->delete(23, 1);
```

### `enable(string|int $serverId, string|int $djId, array $query = []): array`

```php
$mediacp->djs()->enable(23, 3);
```

### `disable(string|int $serverId, string|int $djId, array $query = []): array`

```php
$mediacp->djs()->disable(23, 3);
```
