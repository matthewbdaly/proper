<?php

namespace Matthewbdaly\Proper;

use Closure;
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

    public static function make(array $items)
    {
        return new static($items);
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

    public function map(Closure $callback)
    {
        return new static(array_map($callback, $this->items));
    }

    public function filter(Closure $callback)
    {
        return new static(array_filter($this->items, $callback));
    }

    public function reject(Closure $callback)
    {
        return $this->filter(function ($item) use ($callback) {
            return ! $callback($item);
        });
    }

    public function reduce(Closure $callback, $initial = 0)
    {
        $accumulator = $initial;
        foreach ($this->items as $item) {
            $accumulator = $callback($accumulator, $item);
        }
        return $accumulator;
    }

    public function pluck($name)
    {
        return $this->map(function ($item) use ($name) {
            return $item[$name];
        });
    }

    public function each(Closure $callback)
    {
        foreach ($this->items as $item) {
            $callback($item);
        }
    }

    public function push($item)
    {
        array_push($this->items, $item);
        return new static($this->items, $item);
    }

    public function pop()
    {
        return array_pop($this->items);
    }
}
