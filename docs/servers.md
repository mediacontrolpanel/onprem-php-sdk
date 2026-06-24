# Servers

Access server endpoints through:

```php
$servers = $mediacp->servers();
```

## Methods

### `list(array $query = []): array`

```php
$servers = $mediacp->servers()->list();
```

### `get(string|int $id, array $query = []): array`

```php
$server = $mediacp->servers()->get(1);
```

### `create(array $payload, array $query = []): array`

```php
$server = $mediacp->servers()->create([
    'name' => 'Sydney Node',
    'hostname' => 'syd-node.example.com',
]);
```

### `update(string|int $id, array $payload, array $query = []): array`

```php
$server = $mediacp->servers()->update(1, [
    'name' => 'Sydney Node A',
]);
```

### `patch(string|int $id, array $payload, array $query = []): array`

```php
$server = $mediacp->servers()->patch(1, [
    'enabled' => true,
]);
```

### `delete(string|int $id, array $query = []): array`

```php
$mediacp->servers()->delete(1);
```

### `status(string|int $id): array`

```php
$status = $mediacp->servers()->status(1);
```
