<?php

namespace Matthewbdaly\Proper;

use Countable;

class Str implements Countable
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
}
