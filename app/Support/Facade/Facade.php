<?php

namespace App\Support\Facade;

class Facade
{

    public static function __callStatic($method, $arguments)
    {
        return (static::getFacadeAccessor())->$method(...$arguments);
    }
}
