<?php declare(strict_types=1);

namespace Matthewbdaly\Proper\Traits;

trait IsMacroable
{
    protected static $macros = [];

    public function macro(string $name, callable $macro)
    {
        static::$macros[$name] = $macro;
    }

    public function __call($method, $parameters)
    {
        if (! static::hasMacro($method)) {
            throw new \BadMethodCallException("Method {$method} does not exist.");
        }

        if (is_callable(static::$macros[$method])) {
            return new static(call_user_func_array(static::$macros[$method]->bindTo($this, static::class), $parameters));
        }

        return new static(call_user_func_array(static::$macros[$method], $parameters));
    }

    protected function hasMacro(string $name)
    {
        return isset(static::$macros[$name]);
    }
}
