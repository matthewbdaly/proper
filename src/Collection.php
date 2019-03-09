<?php declare(strict_types = 1);

namespace Matthewbdaly\Proper;

use Closure;
use Countable;
use ArrayAccess;
use SeekableIterator;
use JsonSerializable;
use Matthewbdaly\Proper\Contracts\Collectable;
use Matthewbdaly\Proper\Traits\IsCollection;
use Matthewbdaly\Proper\Traits\IsMacroable;

/**
 * Collection class
 */
class Collection implements Countable, ArrayAccess, SeekableIterator, JsonSerializable, Collectable
{
    use IsMacroable, IsCollection;

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
