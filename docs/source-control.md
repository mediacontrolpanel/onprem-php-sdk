# Source Control

Access source control endpoints through:

```php
$source = $mediacp->sourceControl();
```

### `start(string|int $serverId): array`

```php
$mediacp->sourceControl()->start(237);
```

### `stop(string|int $serverId): array`

```php
$mediacp->sourceControl()->stop(237);
```

### `restart(string|int $serverId): array`

```php
$mediacp->sourceControl()->restart(237);
```

### `disconnectDj(string|int $serverId): array`

```php
$mediacp->sourceControl()->disconnectDj(237);
```
