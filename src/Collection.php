<?php

namespace Matthewbdaly\Proper;

class Collection
{
    protected $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }
}
