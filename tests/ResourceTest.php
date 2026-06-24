<?php

declare(strict_types=1);

namespace MediaCP\Tests;

use GuzzleHttp\Psr7\Response;
use MediaCP\Panel;
use MediaCP\Tests\Fakes\FakeHttpClient;
use PHPUnit\Framework\TestCase;

class ResourceTest extends TestCase
{
    private FakeHttpClient $http;

    private Panel $panel;

    protected function setUp(): void
    {
        $this->http = new FakeHttpClient(new Response(200, [], '{"ok":true}'));
        $this->panel = new Panel([
            'base_url' => 'https://panel.example.com/api',
            'auth_type' => 'none',
        ], $this->http);
    }

    public function testCrudResourceMethodsUseExpectedPaths(): void
    {
        $this->panel->users()->list(['page' => 2]);
        $this->panel->users()->get(123);
        $this->panel->users()->create(['email' => 'user@example.com']);
        $this->panel->users()->update(123, ['name' => 'Updated']);
        $this->panel->users()->patch(123, ['enabled' => true]);
        $this->panel->users()->delete(123);

        self::assertSame('users', $this->http->requests[0]['uri']);
        self::assertSame(['page' => 2], $this->http->requests[0]['options']['query']);
        self::assertSame('users/123', $this->http->requests[1]['uri']);
        self::assertSame('POST', $this->http->requests[2]['method']);
        self::assertSame('PUT', $this->http->requests[3]['method']);
        self::assertSame('PATCH', $this->http->requests[4]['method']);
        self::assertSame('DELETE', $this->http->requests[5]['method']);
    }

    public function testServiceControlMethodsUseExpectedPaths(): void
    {
        $this->panel->services()->start(456);
        $this->panel->services()->stop(456);
        $this->panel->services()->restart(456);

        self::assertSame('services/456/start', $this->http->requests[0]['uri']);
        self::assertSame('services/456/stop', $this->http->requests[1]['uri']);
        self::assertSame('services/456/restart', $this->http->requests[2]['uri']);
    }

    public function testSystemMethodsUseExpectedPaths(): void
    {
        $this->panel->system()->status();
        $this->panel->system()->health();
        $this->panel->system()->version();

        self::assertSame('system/status', $this->http->requests[0]['uri']);
        self::assertSame('system/health', $this->http->requests[1]['uri']);
        self::assertSame('system/version', $this->http->requests[2]['uri']);
    }

    public function testStatisticsMethodsUseExpectedPaths(): void
    {
        $this->panel->statistics()->usage(['service_id' => 456]);
        $this->panel->statistics()->bandwidth(['service_id' => 456]);
        $this->panel->statistics()->listeners(['service_id' => 456]);

        self::assertSame('statistics/usage', $this->http->requests[0]['uri']);
        self::assertSame(['service_id' => 456], $this->http->requests[0]['options']['query']);
        self::assertSame('statistics/bandwidth', $this->http->requests[1]['uri']);
        self::assertSame('statistics/listeners', $this->http->requests[2]['uri']);
    }
}
