<?php

namespace spec\Matthewbdaly\Proper;

use Matthewbdaly\Proper\Collection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionSpec extends ObjectBehavior
{
    function let()
    {
        $items = [];
        $this->beConstructedWith($items);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Collection::class);
    }

    function it_implements_countable()
    {
        $this->shouldImplement('Countable');
    }

    function it_can_count_correctly()
    {
        $items = [
            'foo' => 'bar'
        ];
        $this->beConstructedWith($items);
        $this->count()->shouldReturn(1);
    }

    function it_implements_array_access()
    {
        $this->shouldImplement('ArrayAccess');
    }

    function it_can_confirm_offset_exists()
    {
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->offsetExists(0)->shouldReturn(true);
    }
}
