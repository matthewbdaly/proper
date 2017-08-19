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
}
