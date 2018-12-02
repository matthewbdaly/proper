<?php declare(strict_types = 1);

namespace Matthewbdaly\Proper;

use Closure;
use Countable;
use ArrayAccess;
use Iterator;
use JsonSerializable;
use Matthewbdaly\Proper\Contracts\Collectable;
use Matthewbdaly\Proper\Traits\IsCollection;

/**
 * Collection class
 */
class Collection implements Countable, ArrayAccess, Iterator, JsonSerializable, Collectable
{
    use IsCollection;

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
}
