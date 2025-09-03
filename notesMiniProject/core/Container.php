<?php

namespace Core;

class Container
{
    private array $bindings = [];

    public function bind(string $key, callable $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(string $key): mixed
    {
        if (!isset($this->bindings[$key])) {
            throw new \Exception("No binding found for key: {$key}");
        }

        return $this->bindings[$key]();
    }
}
