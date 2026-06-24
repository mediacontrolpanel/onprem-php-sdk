# Accounts

Access account endpoints through:

```php
$accounts = $mediacp->accounts();
```

## Methods

### `list(array $query = []): array`

```php
$accounts = $mediacp->accounts()->list(['page' => 1]);
```

### `get(string|int $id, array $query = []): array`

```php
$account = $mediacp->accounts()->get(123);
```

### `create(array $payload, array $query = []): array`

```php
$account = $mediacp->accounts()->create([
    'name' => 'Example Customer',
    'email' => 'customer@example.com',
]);
```

### `update(string|int $id, array $payload, array $query = []): array`

```php
$account = $mediacp->accounts()->update(123, [
    'name' => 'Updated Customer',
]);
```

### `patch(string|int $id, array $payload, array $query = []): array`

```php
$account = $mediacp->accounts()->patch(123, [
    'status' => 'active',
]);
```

### `delete(string|int $id, array $query = []): array`

```php
$mediacp->accounts()->delete(123);
```

### `suspend(string|int $id, array $payload = []): array`

```php
$mediacp->accounts()->suspend(123, [
    'reason' => 'Billing hold',
]);
```

### `unsuspend(string|int $id, array $payload = []): array`

```php
$mediacp->accounts()->unsuspend(123);
```
