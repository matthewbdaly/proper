<?php

namespace Matthewbdaly\Proper;

use Countable;
use ArrayAccess;
use Iterator;

/**
 * String class
 */
class Str implements Countable, ArrayAccess, Iterator
{
    /**
     * String
     *
     * @var string
     */
    protected $string;

    /**
     * Position
     *
     * @var integer
     */
    protected $position = 0;

    /**
     * Constructor
     *
     * @param string $string String to use.
     * @return void
     */
    public function __construct(string $string = '')
    {
        $this->string = $string;
    }

    /**
     * Create string
     *
     * @param string $string String to use.
     * @return Str
     */
    public static function make(string $string)
    {
        return new static($string);
    }

    /**
     * Return count of characters
     *
     * @return integer
     */
    public function count()
    {
        return strlen($this->string);
    }

    /**
     * Does item exist?
     *
     * @param mixed $offset The offset.
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->string[$offset]);
    }

    /**
     * Get offset
     *
     * @param mixed $offset The offset.
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->string[$offset]) ? $this->string[$offset] : null;
    }

    /**
     * Set offset
     *
     * @param mixed $offset The offset.
     * @param mixed $value  The value to set.
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->string[] = $value;
        } else {
            $this->string[$offset] = $value;
        }
    }

    /**
     * Unset offset
     *
     * @param mixed $offset The offset.
     * @return void
     */
    public function offsetUnset($offset)
    {
        $this->string = substr_replace($this->string, '', $offset, 1);
    }

    /**
     * Get current item
     *
     * @return mixed
     */
    public function current()
    {
        return $this->string[$this->position];
    }

    /**
     * Get key for current item
     *
     * @return mixed
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Move counter to next item
     *
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Move counter back to zero
     *
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Is current item valid?
     *
     * @return boolean
     */
    public function valid()
    {
        return isset($this->string[$this->position]);
    }
}
