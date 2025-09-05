<?php

namespace Core\Middleware;

class Middleware
{
    public static function resolve(Type $type): Handler
    {
        return match ($type) {
            Type::AUTH => new Auth(),
            Type::GUEST => new Guest(),
            Type::NULL => new NullMiddleware(),
        };
    }
}
