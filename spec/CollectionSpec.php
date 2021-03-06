<?php declare(strict_types = 1);

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

    function it_can_be_called_statically()
    {
        $items = [
            'foo' => 'bar'
        ];
        $this->beConstructedThrough('make', [$items]);
        $this->count()->shouldReturn(1);
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
        $this->toArray()->shouldReturn(['baz', 'bar']);
        $this->offsetGet(0)->shouldReturn('baz');
    }

    function it_appends_element_when_offset_set_passed_null()
    {
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->offsetSet(null, 'baz');
        $this->toArray()->shouldReturn(['foo', 'bar', 'baz']);
        $this->offsetGet(0)->shouldReturn('foo');
        $this->offsetGet(1)->shouldReturn('bar');
        $this->offsetGet(2)->shouldReturn('baz');
    }

    function it_can_unset_offset()
    {
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->offsetUnset(1);
        $this->toArray()->shouldReturn(['foo']);
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

    function it_can_convert_to_json()
    {
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->toJson()->shouldReturn(json_encode($items));
    }

    function it_can_convert_to_array()
    {
        $items = [
            'foo',
            'bar'
        ];
        $this->beConstructedWith($items);
        $this->toArray()->shouldReturn($items);
    }

    function it_implements_map()
    {
        $items = [
            1,
            2,
            3
        ];
        $this->beConstructedWith($items);
        $this->map(function ($item) {
            return ($item * $item * $item);
        })->toArray()->shouldReturn([1,8,27]);
    }

    function it_implements_filter()
    {
        $items = [
            'foo' => 1,
            'bar' => 2,
            'baz' => 3
        ];
        $this->beConstructedWith($items);
        $this->filter(function ($v) {
            return $v > 1;
        })->toArray()->shouldReturn([
            'bar' => 2,
            'baz' => 3
        ]);
    }

    function it_implements_reject()
    {
        $items = [
            'foo' => 1,
            'bar' => 2,
            'baz' => 3
        ];
        $this->beConstructedWith($items);
        $this->reject(function ($v) {
            return $v <= 1;
        })->toArray()->shouldReturn([
            'bar' => 2,
            'baz' => 3
        ]);
    }

    function it_implements_reduce()
    {
        $items = [1, 2, 3];
        $this->beConstructedWith($items);
        $this->reduce(function ($total, $item) {
            return $total += $item;
        })->shouldReturn(6);
    }

    function it_implements_pluck()
    {
        $items = [[
            'foo' => 1,
            'bar' => 2
        ], [
            'foo' => 3,
            'bar' => 4
        ], [
            'foo' => 5,
            'bar' => 6
        ]];
        $this->beConstructedWith($items);
        $this->pluck('foo')->toArray()->shouldReturn([1, 3, 5]);
    }

    function it_implements_each(\DateTime $date)
    {
        $this->beConstructedWith([$date]);
        $this->each(function ($item) {
            $item->setTimezone('Europe/London');
        });
        $date->setTimezone('Europe/London')->shouldHaveBeenCalled();
    }

    function it_implements_push()
    {
        $items = [1, 2, 3];
        $this->beConstructedWith($items);
        $this->push(4)->toArray()->shouldReturn([1, 2, 3, 4]);
    }

    function it_implements_pop()
    {
        $items = [1, 2, 3];
        $this->beConstructedWith($items);
        $this->pop()->shouldReturn(3);
        $this->toArray()->shouldReturn([1, 2]);
    }

    function it_implements_unshift()
    {
        $items = [1, 2, 3];
        $this->beConstructedWith($items);
        $this->unshift(4)->toArray()->shouldReturn([4, 1, 2, 3]);
    }

    function it_implements_shift()
    {
        $items = [1, 2, 3];
        $this->beConstructedWith($items);
        $this->shift()->shouldReturn(1);
        $this->toArray()->shouldReturn([2, 3]);
    }

    function it_implements_sort()
    {
        $items = [2, 1, 3];
        $this->beConstructedWith($items);
        $this->sort(function ($a, $b) {
            return ($a > $b) ? -1 : 1;
        })->toArray()->shouldReturn([3, 2, 1]);
    }

    function it_allows_a_callback_to_sort()
    {
        $items = [2, 1, 3];
        $this->beConstructedWith($items);
        $this->sort()->toArray()->shouldReturn([1, 2, 3]);
    }

    function it_implements_reverse()
    {
        $items = [3, 2, 1];
        $this->beConstructedWith($items);
        $this->reverse()->toArray()->shouldReturn([1, 2, 3]);
    }

    function it_implements_keys()
    {
        $items = [
            1 => "a",
            2 => "b",
            3 => "c"
        ];
        $this->beConstructedWith($items);
        $this->keys()->toArray()->shouldReturn([1, 2, 3]);
    }

    function it_implements_values()
    {
        $items = [
            1 => "a",
            2 => "b",
            3 => "c"
        ];
        $this->beConstructedWith($items);
        $this->values()->toArray()->shouldReturn(["a", "b", "c"]);
    }

    function it_implements_chunk()
    {
        $items = [
            "a",
            "b",
            "c",
            "d",
            "e"
        ];
        $this->beConstructedWith($items);
        $this->chunk(2)->toArray()->shouldReturn([[
            "a",
            "b",
        ], [
            "c",
            "d",
        ], [
            "e"
        ]]);
    }

    function it_implements_merge()
    {
        $items = [
            "a",
            "b",
            "c",
            "d",
            "e"
        ];
        $merged = [
            "f",
            "g"
        ];
        $this->beConstructedWith($items);
        $this->merge($merged)->toArray()->shouldReturn([
            "a",
            "b",
            "c",
            "d",
            "e",
            "f",
            "g"
        ]);
    }

    function it_implements_seek()
    {
        $items = [
            "a",
            "b",
            "c",
            "d",
            "e"
        ];
        $this->beConstructedWith($items);
        $this->seek(2)->current()->shouldReturn("c");
    }

    function it_implements_group_by()
    {
        $items = [
                ['account_id' => 'account-x10', 'product' => 'Chair'],
                    ['account_id' => 'account-x10', 'product' => 'Bookcase'],
                        ['account_id' => 'account-x11', 'product' => 'Desk'],
        ];
        $this->beConstructedWith($items);
        $this->groupBy('account_id')->toArray()->shouldReturn([
            'account-x10' => [
                ['account_id' => 'account-x10', 'product' => 'Chair'],
                ['account_id' => 'account-x10', 'product' => 'Bookcase'],
            ],
            'account-x11' => [
                ['account_id' => 'account-x11', 'product' => 'Desk'],
            ],
        ]);
    }

    function it_implements_flatten()
    {
        $items = [
            1,
            2,
            3,
            [4, 5],
            [6, 7, 8],
            9
        ];
        $this->beConstructedWith($items);
        $this->flatten()->toArray()->shouldReturn([
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9
        ]);
    }

    function it_supports_macros()
    {
        $items = [16, 25];
        $this->beConstructedWith($items);
        $this->macro('squareRoot', function() {
            return $this->map(function($number) {
                return (int)sqrt($number);
            });
        });
        $this->squareRoot()->toArray()->shouldReturn([4, 5]);
    }

    function it_supports_static_macros()
    {
        Collection::macro('squareRoot', function() {
            return $this->map(function($number) {
                return (int)sqrt($number);
            });
        });
        $items = [16, 25];
        $this->beConstructedWith($items);
        $this->squareRoot()->toArray()->shouldReturn([4, 5]);
    }
}
