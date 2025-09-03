<?php

namespace Core;

class App
{
    protected static Container $container;

    public static function setContainer(Container $container)
    {
        self::$container = $container;
    }

    public static function bind(string $name, callable $resolver)
    {
        self::$container->bind($name, $resolver);
    }

    public static function resolve(string $name)
    {
        return self::$container->resolve($name);
    }
}
