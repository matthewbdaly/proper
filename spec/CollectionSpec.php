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

    function it_can_get_offset()
    {
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->offsetGet(0)->shouldReturn('foo');
    }

    function it_can_set_offset()
    {
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->offsetSet(0, 'baz');
        $this->offsetGet(0)->shouldReturn('baz');
    }

    function it_can_unset_offset()
    {
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->offsetUnset(1);
        $this->offsetGet(1)->shouldReturn(null);
        $this->count()->shouldReturn(1);
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
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->current()->shouldReturn('foo');
    }

    function it_can_get_key()
    {
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->key()->shouldReturn(0);
    }

    function it_can_move_forward()
    {
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->key()->shouldReturn(0);
        $this->next();
        $this->key()->shouldReturn(1);
    }

    function it_can_rewind()
    {
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->next();
        $this->key()->shouldReturn(1);
        $this->rewind();
        $this->key()->shouldReturn(0);
    }

    function it_can_validate()
    {
        $this->valid()->shouldReturn(false);
    }

    function it_implements_json_serializable()
    {
        $this->shouldImplement('JsonSerializable');
    }

    function it_can_json_serialize()
    {
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->jsonSerialize()->shouldReturn(json_encode($items));
    }

    function it_implements_collectable()
    {
        $this->shouldImplement('Matthewbdaly\Proper\Contracts\Collectable');
    }
}
