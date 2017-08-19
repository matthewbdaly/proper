<?php

namespace Matthewbdaly\Proper\Contracts;

use Closure;

interface Collectable
{
    public function toJson();

    public function toArray();

    public function map(Closure $callback);
}
