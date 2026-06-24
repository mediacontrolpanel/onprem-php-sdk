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
            'base_url' => 'https://panel.example.com',
            'auth_type' => 'none',
        ], $this->http);
    }

    public function testServiceMethodsUsePostmanPaths(): void
    {
        $this->panel->services()->list(['user_id' => 1, 'page' => 1]);
        $this->panel->services()->show(237);
        $this->panel->services()->create(237, ['unique_id' => 'My New Service']);
        $this->panel->services()->update(237, ['maxuser' => 500]);
        $this->panel->services()->updateSongTitle(237, 'New Song title');
        $this->panel->services()->start(237);
        $this->panel->services()->stop(237);
        $this->panel->services()->restart(237);
        $this->panel->services()->suspend(237, ['reason' => 'Billing']);
        $this->panel->services()->unsuspend(237);
        $this->panel->services()->delete(243);

        self::assertSame('api/0/media-service/list', $this->http->requests[0]['uri']);
        self::assertSame(['user_id' => 1, 'page' => 1], $this->http->requests[0]['options']['query']);
        self::assertSame('api/237/media-service/show', $this->http->requests[1]['uri']);
        self::assertSame('api/237/media-service/store', $this->http->requests[2]['uri']);
        self::assertSame(['unique_id' => 'My New Service'], $this->http->requests[2]['options']['form_params']);
        self::assertSame('api/237/media-service/update', $this->http->requests[3]['uri']);
        self::assertSame('api/237/media-service/update-song-title', $this->http->requests[4]['uri']);
        self::assertSame(['title' => 'New Song title'], $this->http->requests[4]['options']['form_params']);
        self::assertSame('api/237/media-service/start-service', $this->http->requests[5]['uri']);
        self::assertSame('GET', $this->http->requests[5]['method']);
        self::assertSame('api/237/media-service/stop-service', $this->http->requests[6]['uri']);
        self::assertSame('api/237/media-service/restart-service', $this->http->requests[7]['uri']);
        self::assertSame('api/237/media-service/suspend', $this->http->requests[8]['uri']);
        self::assertSame('POST', $this->http->requests[8]['method']);
        self::assertSame('api/237/media-service/unsuspend', $this->http->requests[9]['uri']);
        self::assertSame('api/243/media-service/delete', $this->http->requests[10]['uri']);
        self::assertSame('DELETE', $this->http->requests[10]['method']);
    }

    public function testServiceMetricsUsePostmanPaths(): void
    {
        $this->panel->services()->serviceInfo(237, ['extra' => true]);
        $this->panel->services()->connections(237, ['page' => 1]);
        $this->panel->services()->trackHistory(237, ['limit' => 25]);
        $this->panel->services()->bandwidthHistory(237);
        $this->panel->services()->connectionHistory(237);

        self::assertSame('api/237/media-service/serviceInfo', $this->http->requests[0]['uri']);
        self::assertSame(['extra' => true], $this->http->requests[0]['options']['query']);
        self::assertSame('api/237/media-service/connections', $this->http->requests[1]['uri']);
        self::assertSame('api/237/media-service/trackHistory', $this->http->requests[2]['uri']);
        self::assertSame('api/237/media-service/bandwidthHistory', $this->http->requests[3]['uri']);
        self::assertSame('api/237/media-service/connectionHistory', $this->http->requests[4]['uri']);
    }

    public function testUsersAndStatisticsUsePostmanPaths(): void
    {
        $this->panel->users()->list(['page' => 1]);
        $this->panel->users()->show(17);
        $this->panel->users()->create(['email' => 'user@example.com']);
        $this->panel->users()->delete(17);
        $this->panel->statistics()->summary();

        self::assertSame('api/0/user/list', $this->http->requests[0]['uri']);
        self::assertSame('api/0/user/show/17', $this->http->requests[1]['uri']);
        self::assertSame('api/0/user/store', $this->http->requests[2]['uri']);
        self::assertSame(['email' => 'user@example.com'], $this->http->requests[2]['options']['form_params']);
        self::assertSame('api/0/user/delete/17', $this->http->requests[3]['uri']);
        self::assertSame('api/0/Statistics', $this->http->requests[4]['uri']);
    }

    public function testDjMethodsUsePostmanPaths(): void
    {
        $this->panel->djs()->list(23);
        $this->panel->djs()->show(23, 3);
        $this->panel->djs()->create(23, ['username' => 'dj']);
        $this->panel->djs()->update(23, 3, ['username' => 'updated']);
        $this->panel->djs()->enable(23, 3, ['search' => 'dj']);
        $this->panel->djs()->disable(23, 3);
        $this->panel->djs()->delete(23, 1);

        self::assertSame('api/23/dj/list', $this->http->requests[0]['uri']);
        self::assertSame('api/23/dj/show/3', $this->http->requests[1]['uri']);
        self::assertSame('api/23/dj/store', $this->http->requests[2]['uri']);
        self::assertSame('api/23/dj/update/3', $this->http->requests[3]['uri']);
        self::assertSame('api/23/dj/enable/3', $this->http->requests[4]['uri']);
        self::assertSame('PATCH', $this->http->requests[4]['method']);
        self::assertSame(['search' => 'dj'], $this->http->requests[4]['options']['query']);
        self::assertSame('api/23/dj/disable/3', $this->http->requests[5]['uri']);
        self::assertSame('api/23/dj/delete/1', $this->http->requests[6]['uri']);
    }

    public function testPlaylistMethodsUsePostmanPaths(): void
    {
        $this->panel->playlists()->listAudio(237);
        $this->panel->playlists()->showAudio(237, 12, ['type' => 'jingle']);
        $this->panel->playlists()->createAudio(237, ['title' => 'Playlist']);
        $this->panel->playlists()->duplicateAudio(237, 87);
        $this->panel->playlists()->deleteAudio(237, 93);
        $this->panel->playlists()->listOnDemand(237);
        $this->panel->playlists()->showOnDemand(237, 2);
        $this->panel->playlists()->availableOnDemandTracks(237, 2);
        $this->panel->playlists()->createOnDemand(237, ['title' => 'OD']);
        $this->panel->playlists()->updateOnDemand(237, 3, ['title' => 'Updated']);
        $this->panel->playlists()->deleteOnDemand(237, 3);
        $this->panel->playlistTracks()->list(237, 87, ['type' => 'audio']);
        $this->panel->playlistTracks()->update(237, 15, ['tracks' => [1, 2]], ['type' => 'audio']);

        self::assertSame('api/237/audio-playlist/list', $this->http->requests[0]['uri']);
        self::assertSame('api/237/audio-playlist/show/12', $this->http->requests[1]['uri']);
        self::assertSame(['type' => 'jingle'], $this->http->requests[1]['options']['query']);
        self::assertSame('api/237/audio-playlist/create', $this->http->requests[2]['uri']);
        self::assertSame('api/237/audio-playlist/copy/87', $this->http->requests[3]['uri']);
        self::assertSame('api/237/audio-playlist/delete/93', $this->http->requests[4]['uri']);
        self::assertSame('api/237/ondemand-playlist/index', $this->http->requests[5]['uri']);
        self::assertSame('api/237/ondemand-playlist/show/2', $this->http->requests[6]['uri']);
        self::assertSame('api/237/ondemand-playlist/availableTracks/2', $this->http->requests[7]['uri']);
        self::assertSame('api/237/ondemand-playlist/store', $this->http->requests[8]['uri']);
        self::assertSame('api/237/ondemand-playlist/update/3', $this->http->requests[9]['uri']);
        self::assertSame('api/237/ondemand-playlist/delete/3', $this->http->requests[10]['uri']);
        self::assertSame('api/237/playlist-track/list/87', $this->http->requests[11]['uri']);
        self::assertSame('api/237/playlist-track/update/15', $this->http->requests[12]['uri']);
    }

    public function testMediaMethodsUsePostmanPaths(): void
    {
        $this->panel->media()->list(13, ['path' => '/']);
        $this->panel->media()->upload(13, ['url' => 'https://example.com/file.mp3']);
        $this->panel->media()->updateTrack(13, ['track_id' => 1]);
        $this->panel->media()->createFolder(13, ['title' => 'Ads', 'path' => '/']);
        $this->panel->media()->renameFolder(13, ['path' => '/Ads', 'title' => 'Spots']);
        $this->panel->media()->move(13, ['tracks[0]' => 1, 'moveToPath' => '/Ads']);
        $this->panel->media()->delete(13, ['tracks[0]' => 1]);
        $this->panel->videoMedia()->list(13, ['page' => 1]);
        $this->panel->videoMedia()->upload(13, ['url' => 'https://example.com/file.mp4']);
        $this->panel->videoMedia()->delete(13, ['filename' => 'sample.mp4']);

        self::assertSame('api/13/media/list', $this->http->requests[0]['uri']);
        self::assertSame('api/13/media/upload', $this->http->requests[1]['uri']);
        self::assertSame('api/13/media/updateTrack', $this->http->requests[2]['uri']);
        self::assertSame('api/13/media/createFolder', $this->http->requests[3]['uri']);
        self::assertSame('api/13/media/renameFolder', $this->http->requests[4]['uri']);
        self::assertSame('api/13/media/renameFolder', $this->http->requests[5]['uri']);
        self::assertSame('api/13/media/delete', $this->http->requests[6]['uri']);
        self::assertSame('api/13/video-media/list', $this->http->requests[7]['uri']);
        self::assertSame('api/13/video-media/upload', $this->http->requests[8]['uri']);
        self::assertSame('api/13/video-media/delete', $this->http->requests[9]['uri']);
    }

    public function testEventJingleSourceStreamAndAutoDjMethodsUsePostmanPaths(): void
    {
        $this->panel->events()->list(237, ['parent_only' => 1]);
        $this->panel->events()->show(237, 210);
        $this->panel->events()->create(237, ['title' => 'Show']);
        $this->panel->events()->duplicate(237, 44);
        $this->panel->events()->delete(237, 45);
        $this->panel->jingles()->list(237);
        $this->panel->jingles()->create(237, ['title' => 'Jingle']);
        $this->panel->jingles()->duplicate(237, 14);
        $this->panel->jingles()->delete(237, 16);
        $this->panel->sourceControl()->start(237);
        $this->panel->sourceControl()->stop(237);
        $this->panel->sourceControl()->restart(237);
        $this->panel->sourceControl()->disconnectDj(237);
        $this->panel->autoDj()->skipTrack(237);
        $this->panel->streamEvents()->list(['type' => 'all']);

        self::assertSame('api/237/event/list', $this->http->requests[0]['uri']);
        self::assertSame('api/237/event/show/210', $this->http->requests[1]['uri']);
        self::assertSame('api/237/event/create', $this->http->requests[2]['uri']);
        self::assertSame('api/237/event/copy/44', $this->http->requests[3]['uri']);
        self::assertSame('api/237/event/delete/45', $this->http->requests[4]['uri']);
        self::assertSame('api/237/audio-playlist/list', $this->http->requests[5]['uri']);
        self::assertSame('api/237/jingle/create', $this->http->requests[6]['uri']);
        self::assertSame('api/237/jingle/copy/14', $this->http->requests[7]['uri']);
        self::assertSame('api/237/jingle/delete/16', $this->http->requests[8]['uri']);
        self::assertSame('api/237/media-service/startSource', $this->http->requests[9]['uri']);
        self::assertSame('api/237/media-service/stopSource', $this->http->requests[10]['uri']);
        self::assertSame('api/237/media-service/restartSource', $this->http->requests[11]['uri']);
        self::assertSame('api/237/media-service/disconnectDj', $this->http->requests[12]['uri']);
        self::assertSame('api/237/media-service/skip-track', $this->http->requests[13]['uri']);
        self::assertSame('api/0/event-log/index', $this->http->requests[14]['uri']);
    }

    public function testStreamTargetMethodsUsePostmanPaths(): void
    {
        $this->panel->streamTargets()->list(20, ['search' => 'youtube']);
        $this->panel->streamTargets()->show(20, 1);
        $this->panel->streamTargets()->status(20, 1);
        $this->panel->streamTargets()->connect(20, 1);
        $this->panel->streamTargets()->disconnect(20, 1);
        $this->panel->streamTargets()->delete(20, 1);

        self::assertSame('api/20/stream-targets/list', $this->http->requests[0]['uri']);
        self::assertSame(['search' => 'youtube'], $this->http->requests[0]['options']['query']);
        self::assertSame('api/20/stream-targets/show/1', $this->http->requests[1]['uri']);
        self::assertSame('api/20/stream-targets/status/1', $this->http->requests[2]['uri']);
        self::assertSame('api/20/stream-targets/connect/1', $this->http->requests[3]['uri']);
        self::assertSame('PATCH', $this->http->requests[3]['method']);
        self::assertSame('api/20/stream-targets/disconnect/1', $this->http->requests[4]['uri']);
        self::assertSame('api/20/stream-targets/delete/1', $this->http->requests[5]['uri']);
    }
}
