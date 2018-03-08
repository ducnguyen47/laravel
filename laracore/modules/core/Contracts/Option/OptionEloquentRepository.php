<?php

namespace Modules\Core\Contracts\Option;

use Modules\Core\Models\Option as OptionModel;

class OptionEloquentRepository implements Option
{
    protected $model;

    public function __construct(OptionModel $model)
    {
        $this->model = $model;
    }

    public function save($key, $value)
    {
        if ($option = $this->model->where('key', $key)->first()) {
            return $option->update(['value' => $value]);
        }
        return $this->model->create(['key' => $key, 'value' => $value]);
    }

    public function get($key)
    {
        return ($option = $this->model->where('key', $key)->first()) ? $option->value : '';
    }
}
