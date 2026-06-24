# Stream Targets

Access stream target endpoints through:

```php
$targets = $mediacp->streamTargets();
```

### `list(string|int $serverId, array $query = []): array`

```php
$targets = $mediacp->streamTargets()->list(20, ['search' => 'youtube']);
```

### `show(string|int $serverId, string|int $targetId, array $query = []): array`

```php
$target = $mediacp->streamTargets()->show(20, 1);
```

### `status(string|int $serverId, string|int $targetId, array $query = []): array`

```php
$status = $mediacp->streamTargets()->status(20, 1);
```

### `connect(string|int $serverId, string|int $targetId, array $query = []): array`

```php
$mediacp->streamTargets()->connect(20, 1);
```

### `disconnect(string|int $serverId, string|int $targetId, array $query = []): array`

```php
$mediacp->streamTargets()->disconnect(20, 1);
```

### `delete(string|int $serverId, string|int $targetId, array $query = []): array`

```php
$mediacp->streamTargets()->delete(20, 1);
```
