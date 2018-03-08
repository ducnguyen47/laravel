<?php

namespace Modules\Core\Contracts\Option;

interface Option
{
    public function save($key, $value);

    public function get($key);
}