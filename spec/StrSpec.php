<?php

namespace spec\Matthewbdaly\Proper;

use Matthewbdaly\Proper\Str;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StrSpec extends ObjectBehavior
{
    function let()
    {
        $str = 'I am the very model of a modern major general';
        $this->beConstructedWith($str);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Str::class);
    }

    function it_implements_countable()
    {
        $this->shouldImplement('Countable');
    }

    function it_can_count_correctly()
    {
        $this->count()->shouldReturn(45);
    }

    function it_can_be_called_statically()
    {
        $str = 'I am the very model of a modern major general';
        $this->beConstructedThrough('make', [$str]);
        $this->count()->shouldReturn(45);
    }

    function it_implements_array_access()
    {
        $this->shouldImplement('ArrayAccess');
    }

    function it_can_confirm_offset_exists()
    {
        $this->offsetExists(0)->shouldReturn(true);
    }

    function it_can_get_offset()
    {
        $this->offsetGet(0)->shouldReturn('I');
    }

    function it_can_set_offset()
    {
        $this->offsetSet(0, 'A');
        $this->offsetGet(0)->shouldReturn('A');
    }

    function it_can_unset_offset()
    {
        $this->offsetUnset(1);
        $this->offsetGet(1)->shouldReturn('a');
        $this->count()->shouldReturn(44);
    }

    function it_implements_traversable()
    {
        $this->shouldImplement('Traversable');
    }

    function it_implements_iterator()
    {
        $this->shouldImplement('Iterator');
    }

    function it_can_get_current_position()
    {
        $this->current()->shouldReturn('I');
    }

    function it_can_get_key()
    {
        $this->key()->shouldReturn(0);
    }

    function it_can_move_forward()
    {
        $this->key()->shouldReturn(0);
        $this->next();
        $this->key()->shouldReturn(1);
    }

    function it_can_rewind()
    {
        $this->next();
        $this->key()->shouldReturn(1);
        $this->rewind();
        $this->key()->shouldReturn(0);
    }

    function it_can_validate()
    {
        $this->valid()->shouldReturn(true);
    }

    function it_renders_to_string()
    {
        $this->__toString()->shouldReturn('I am the very model of a modern major general');
    }

    function it_can_replace()
    {
        $this->replace('modern major general', 'scientist Salarian')->__toString()->shouldReturn('I am the very model of a scientist Salarian');
    }
}
