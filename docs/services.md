# Services

Access audio and video service endpoints through:

```php
$services = $mediacp->services();
```

## Methods

### `list(array $query = []): array`

```php
$services = $mediacp->services()->list(['account_id' => 123]);
```

### `get(string|int $id, array $query = []): array`

```php
$service = $mediacp->services()->get(456);
```

### `create(array $payload, array $query = []): array`

```php
$service = $mediacp->services()->create([
    'account_id' => 123,
    'name' => 'Main Stream',
    'type' => 'audio',
]);
```

### `update(string|int $id, array $payload, array $query = []): array`

```php
$service = $mediacp->services()->update(456, [
    'name' => 'Updated Stream',
]);
```

### `patch(string|int $id, array $payload, array $query = []): array`

```php
$service = $mediacp->services()->patch(456, [
    'enabled' => true,
]);
```

### `delete(string|int $id, array $query = []): array`

```php
$mediacp->services()->delete(456);
```

### `start(string|int $id, array $payload = []): array`

```php
$mediacp->services()->start(456);
```

### `stop(string|int $id, array $payload = []): array`

```php
$mediacp->services()->stop(456);
```

### `restart(string|int $id, array $payload = []): array`

```php
$mediacp->services()->restart(456);
```
