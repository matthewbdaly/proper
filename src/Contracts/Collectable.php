<?php

namespace Matthewbdaly\Proper\Contracts;

interface Collectable
{
    public function toJson();

    public function toArray();
}
