# Statistics

Access usage and listener metrics through:

```php
$statistics = $mediacp->statistics();
```

## Methods

### `list(array $query = []): array`

```php
$statistics = $mediacp->statistics()->list([
    'from' => '2026-01-01',
    'to' => '2026-01-31',
]);
```

### `usage(array $query = []): array`

```php
$usage = $mediacp->statistics()->usage([
    'service_id' => 456,
]);
```

### `bandwidth(array $query = []): array`

```php
$bandwidth = $mediacp->statistics()->bandwidth([
    'service_id' => 456,
    'period' => 'month',
]);
```

### `listeners(array $query = []): array`

```php
$listeners = $mediacp->statistics()->listeners([
    'service_id' => 456,
]);
```

The inherited `get`, `create`, `update`, `patch`, and `delete` methods are also available for API endpoints that follow the standard resource shape.
