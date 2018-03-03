<?php

namespace Matthewbdaly\Proper;

use Closure;
use Countable;
use ArrayAccess;
use Iterator;
use JsonSerializable;
use Matthewbdaly\Proper\Contracts\Collectable;

/**
 * Collection class
 */
class Collection implements Countable, ArrayAccess, Iterator, JsonSerializable, Collectable
{
    /**
     * Items
     *
     * @var $items
     */
    protected $items;

    /**
     * Position
     *
     * @var $position
     */
    protected $position = 0;

    /**
     * Constructor
     *
     * @param array $items Items to collect.
     * @return void
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Create collection
     *
     * @param array $items Items to collect.
     * @return Collection
     */
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

    /**
     * Convert collection to JSON
     *
     * @return string
     */
    public function toJson()
    {
        return $this->jsonSerialize();
    }

    /**
     * Convert collection to array
     *
     * @return array
     */
    public function toArray()
    {
        return $this->items;
    }

    /**
     * Map operation
     *
     * @param Closure $callback The callback to use.
     * @return Collection
     */
    public function map(Closure $callback)
    {
        return new static(array_map($callback, $this->items));
    }

    /**
     * Filter operation
     *
     * @param Closure $callback The callback to use.
     * @return Collection
     */
    public function filter(Closure $callback)
    {
        return new static(array_filter($this->items, $callback));
    }

    /**
     * Reverse filter operation
     *
     * @param Closure $callback The callback to use.
     * @return Collection
     */
    public function reject(Closure $callback)
    {
        return $this->filter(function ($item) use ($callback) {
            return ! $callback($item);
        });
    }

    /**
     * Reduce operation
     *
     * @param Closure $callback The callback to use.
     * @param mixed   $initial  The initial value.
     * @return mixed
     */
    public function reduce(Closure $callback, $initial = 0)
    {
        $accumulator = $initial;
        foreach ($this->items as $item) {
            $accumulator = $callback($accumulator, $item);
        }
        return $accumulator;
    }

    /**
     * Pluck a single field
     *
     * @param mixed $name Name of field to pluck.
     * @return mixed
     */
    public function pluck($name)
    {
        return $this->map(function ($item) use ($name) {
            return $item[$name];
        });
    }

    /**
     * Apply callback to each item in the collection
     *
     * @param Closure $callback The callback to use.
     * @return void
     */
    public function each(Closure $callback)
    {
        foreach ($this->items as $item) {
            $callback($item);
        }
    }

    /**
     * Push item to end of collection
     *
     * @param mixed $item Item to push.
     * @return Collection
     */
    public function push($item)
    {
        array_push($this->items, $item);
        return new static($this->items);
    }

    /**
     * Pop item from end of collection
     *
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->items);
    }

    /**
     * Push item to start of collection
     *
     * @param mixed $item Item to push.
     * @return Collection
     */
    public function unshift($item)
    {
        array_unshift($this->items, $item);
        return new static($this->items);
    }

    /**
     * Pop item from start of collection
     *
     * @return mixed
     */
    public function shift()
    {
        return array_shift($this->items);
    }
}
