<?php

namespace Matthewbdaly\Proper\Contracts;

use Closure;

interface Collectable
{
    /**
     * Create collection
     *
     * @param array $items Items to collect.
     * @return Collection
     */
    public static function make(array $items);

    /**
     * Convert collection to JSON
     *
     * @return string
     */
    public function toJson();

    /**
     * Convert collection to array
     *
     * @return array
     */
    public function toArray();

    /**
     * Map operation
     *
     * @param Closure $callback The callback to use.
     * @return Collectable
     */
    public function map(Closure $callback);

    /**
     * Filter operation
     *
     * @param Closure $callback The callback to use.
     * @return Collectable
     */
    public function filter(Closure $callback);

    /**
     * Reverse filter operation
     *
     * @param Closure $callback The callback to use.
     * @return Collectable
     */
    public function reject(Closure $callback);

    /**
     * Reduce operation
     *
     * @param Closure $callback The callback to use.
     * @param mixed   $initial  The initial value.
     * @return mixed
     */
    public function reduce(Closure $callback, $initial = 0);

    /**
     * Pluck a single field
     *
     * @param mixed $name Name of field to pluck.
     * @return mixed
     */
    public function pluck($name);

    /**
     * Apply callback to each item in the collection
     *
     * @param Closure $callback The callback to use.
     * @return void
     */
    public function each(Closure $callback);

    /**
     * Push item to end of collection
     *
     * @param mixed $item Item to push.
     * @return Collectable
     */
    public function push($item);

    /**
     * Pop item from end of collection
     *
     * @return mixed
     */
    public function pop();

    /**
     * Push item to start of collection
     *
     * @param mixed $item Item to push.
     * @return Collectable
     */
    public function unshift($item);

    /**
     * Pop item from start of collection
     *
     * @return mixed
     */
    public function shift();
}
