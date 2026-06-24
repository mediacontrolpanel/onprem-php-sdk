<?php

declare(strict_types=1);

namespace MediaCP\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class MediaCP extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'mediacp';
    }
}
