<?php declare(strict_types = 1);

namespace Matthewbdaly\Proper;

use Countable;
use ArrayAccess;
use SeekableIterator;
use Matthewbdaly\Proper\Contracts\Stringable;
use Matthewbdaly\Proper\Traits\IsString;

/**
 * String class
 */
class Str implements Countable, ArrayAccess, SeekableIterator, Stringable
{
    use IsString;

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
    public static function make(string $string): Stringable
    {
        return new static($string);
    }
}
