# Jingle

Access jingle playlist endpoints through:

```php
$jingles = $mediacp->jingles();
```

### `list(string|int $serverId, array $query = []): array`

```php
$jingles = $mediacp->jingles()->list(237, ['page' => 1]);
```

### `create(string|int $serverId, array $payload): array`

```php
$jingle = $mediacp->jingles()->create(237, ['title' => 'Station IDs']);
```

### `duplicate(string|int $serverId, string|int $jingleId): array`

```php
$jingle = $mediacp->jingles()->duplicate(237, 14);
```

### `delete(string|int $serverId, string|int $jingleId): array`

```php
$mediacp->jingles()->delete(237, 16);
```
