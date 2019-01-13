<?php declare(strict_types = 1);

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

    function it_appends_element_when_offset_set_passed_null()
    {
        $this->offsetSet(null, 'B');
        $this->offsetGet(0)->shouldReturn('I');
        $this->offsetGet(45)->shouldReturn('B');
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

    function it_can_convert_to_upper()
    {
        $this->toUpper()->__toString()->shouldReturn('I AM THE VERY MODEL OF A MODERN MAJOR GENERAL');
    }

    function it_can_convert_to_lower()
    {
        $this->toLower()->__toString()->shouldReturn('i am the very model of a modern major general');
    }

    function it_can_trim()
    {
        $str = '  I am the very model of a modern major general  ';
        $this->beConstructedWith($str);
        $this->trim()->__toString()->shouldReturn('I am the very model of a modern major general');
    }

    function it_can_ltrim()
    {
        $str = '  I am the very model of a modern major general  ';
        $this->beConstructedWith($str);
        $this->ltrim()->__toString()->shouldReturn('I am the very model of a modern major general  ');
    }

    function it_can_rtrim()
    {
        $str = '  I am the very model of a modern major general  ';
        $this->beConstructedWith($str);
        $this->rtrim()->__toString()->shouldReturn('  I am the very model of a modern major general');
    }

    function it_implements_seek()
    {
        $str = 'I am the very model of a modern major general  ';
        $this->beConstructedWith($str);
        $this->seek(2)->current()->shouldReturn("a");
    }
}
