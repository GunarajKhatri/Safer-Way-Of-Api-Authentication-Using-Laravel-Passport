<?php

namespace App\Support\Facade;

use App\Support\HashManager;


class Hash extends Facade
{
    protected static function getFacadeAccessor()
    {
        return app(HashManager::class);
    }
}
