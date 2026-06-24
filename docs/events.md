# Event / Schedule

Access scheduled event endpoints through:

```php
$events = $mediacp->events();
```

### `list(string|int $serverId, array $query = []): array`

```php
$events = $mediacp->events()->list(237, ['parent_only' => 1]);
```

### `show(string|int $serverId, string|int $eventId): array`

```php
$event = $mediacp->events()->show(237, 210);
```

### `create(string|int $serverId, array $payload): array`

```php
$event = $mediacp->events()->create(237, ['title' => 'Morning Show']);
```

### `duplicate(string|int $serverId, string|int $eventId): array`

```php
$event = $mediacp->events()->duplicate(237, 44);
```

### `delete(string|int $serverId, string|int $eventId): array`

```php
$mediacp->events()->delete(237, 45);
```
