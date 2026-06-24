# System

Access panel-level system endpoints through:

```php
$system = $mediacp->system();
```

## Methods

### `list(array $query = []): array`

```php
$system = $mediacp->system()->list();
```

### `status(): array`

```php
$status = $mediacp->system()->status();
```

### `health(): array`

```php
$health = $mediacp->system()->health();
```

### `version(): array`

```php
$version = $mediacp->system()->version();
```

The inherited `get`, `create`, `update`, `patch`, and `delete` methods are also available for API endpoints that follow the standard resource shape.
