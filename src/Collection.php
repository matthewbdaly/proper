<?php

namespace Matthewbdaly\Proper;

use Countable;
use ArrayAccess;
use Iterator;
use JsonSerializable;
use Matthewbdaly\Proper\Contracts\Collectable;

class Collection implements Countable, ArrayAccess, Iterator, JsonSerializable, Collectable
{
    protected $items;

    protected $position = 0;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function count()
    {
        return count($this->items);
    }

    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    public function current()
    {
        return $this->items[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function valid()
    {
        return isset($this->items[$this->position]);
    }

    public function jsonSerialize()
    {
        return json_encode($this->items);
    }

    public function toJson()
    {
        return $this->jsonSerialize();
    }

    public function toArray()
    {
        return $this->items;
    }
}
