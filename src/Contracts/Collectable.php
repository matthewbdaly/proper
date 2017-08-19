<?php

namespace Matthewbdaly\Proper\Contracts;

use Closure;

interface Collectable
{
    public static function make(array $items);

    public function toJson();

    public function toArray();

    public function map(Closure $callback);

    public function filter(Closure $callback);

    public function reject(Closure $callback);

    public function reduce(Closure $callback, $initial = 0);

    public function pluck($name);

    public function each(Closure $callback);
}
