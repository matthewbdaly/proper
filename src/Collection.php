<?php

namespace Matthewbdaly\Proper;

class Collection implements \Countable
{
    protected $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function count()
    {
        return count($this->items);
    }
}
