<?php

namespace Matthewbdaly\Proper\Contracts;

interface Stringable
{
    /**
     * Create string
     * @param string $string String to use.
     */
    public static function make(string $string);

    /**
     * Return count of characters
     */
    public function count();

    /**
     * Does item exist?
     */
    public function offsetExists($offset);

    /**
     * Get offset
     */
    public function offsetGet($offset);

    /**
     * Set offset
     */
    public function offsetSet($offset, $value);

    /**
     * Unset offset
     */
    public function offsetUnset($offset);

    /**
     * Get current item
     */
    public function current();

    /**
     * Get key for current item
     */
    public function key();

    /**
     * Move counter to next item
     */
    public function next();

    /**
     * Move counter back to zero
     */
    public function rewind();

    /**
     * Is current item valid?
     */
    public function valid();

    public function __toString();

    public function replace($find, $replace);

    public function toUpper();

    public function toLower();

    public function trim();

    public function ltrim();

    public function rtrim();
}
