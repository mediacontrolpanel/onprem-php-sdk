<?php

declare(strict_types=1);

namespace MediaCP\Laravel;

use Illuminate\Support\ServiceProvider;
use MediaCP\Panel;

class MediaCPServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/mediacp.php', 'mediacp');

        $this->app->singleton(Panel::class, function (): Panel {
            return new Panel((array) config('mediacp'));
        });

        $this->app->alias(Panel::class, 'mediacp');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/mediacp.php' => config_path('mediacp.php'),
        ], 'mediacp-config');
    }
}
