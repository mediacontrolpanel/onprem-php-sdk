<?php

declare(strict_types=1);

namespace MediaCP\Tests\Laravel;

use MediaCP\Laravel\MediaCPServiceProvider;
use MediaCP\Panel;
use Orchestra\Testbench\TestCase;

class MediaCPServiceProviderTest extends TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            MediaCPServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('mediacp.base_url', 'https://panel.example.com/api');
        $app['config']->set('mediacp.auth_type', 'none');
    }

    public function testItRegistersPanelInTheContainer(): void
    {
        self::assertInstanceOf(Panel::class, $this->app->make(Panel::class));
        self::assertSame($this->app->make(Panel::class), $this->app->make('mediacp'));
    }
}
