<?php

namespace Matthewbdaly\Proper;

use Countable;
use ArrayAccess;

class Str implements Countable, ArrayAccess
{
    protected $string;

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
}
