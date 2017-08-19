<?php

namespace spec\Matthewbdaly\Proper;

use Matthewbdaly\Proper\Str;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StrSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Str::class);
    }

    function it_implements_countable()
    {
        $this->shouldImplement('Countable');
    }

    function it_can_be_called_statically()
    {
        $str = 'I am the very model of a modern major general';
        $this->beConstructedThrough('make', [$str]);
        $this->count()->shouldReturn(45);
    }
}
