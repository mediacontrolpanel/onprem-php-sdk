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

### `show(string|int $userId): array`

```php
$user = $mediacp->users()->show(17);
```

### `create(array $payload): array`

```php
$user = $mediacp->users()->create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
]);
```

### `delete(string|int $userId): array`

```php
$mediacp->users()->delete(123);
```
