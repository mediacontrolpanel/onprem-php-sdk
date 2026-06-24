# Users

Access user endpoints through:

```php
$users = $mediacp->users();
```

## Methods

### `list(array $query = []): array`

```php
$users = $mediacp->users()->list(['page' => 1]);
```

### `get(string|int $id, array $query = []): array`

```php
$user = $mediacp->users()->get(123);
```

### `create(array $payload, array $query = []): array`

```php
$user = $mediacp->users()->create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
]);
```

### `update(string|int $id, array $payload, array $query = []): array`

```php
$user = $mediacp->users()->update(123, [
    'name' => 'Updated User',
]);
```

### `patch(string|int $id, array $payload, array $query = []): array`

```php
$user = $mediacp->users()->patch(123, [
    'enabled' => true,
]);
```

### `delete(string|int $id, array $query = []): array`

```php
$mediacp->users()->delete(123);
```
