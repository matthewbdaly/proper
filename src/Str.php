<?php

namespace Matthewbdaly\Proper;

use Countable;
use ArrayAccess;
use Iterator;

class Str implements Countable, ArrayAccess, Iterator
{
    protected $string;

    protected $position = 0;

    public function __construct(string $string = '')
    {
        $this->string = $string;
    }

    public static function make(string $string)
    {
        return new static($string);
    }

    public function count()
    {
        return strlen($this->string);
    }

    public function offsetExists($offset)
    {
        return isset($this->string[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->string[$offset]) ? $this->string[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->string[] = $value;
        } else {
            $this->string[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        $this->string = substr_replace($this->string, '', $offset, 1);
    }

    public function current()
    {
        return $this->string[$this->position];
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
        return isset($this->string[$this->position]);
    }
}
