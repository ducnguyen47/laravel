<?php
namespace Modules\Widget\Repositories;

use Modules\Widget\Models\Widget;

class WidgetEloquentRepository implements WidgetRepository
{
    protected $widget;

    public function __construct(Widget $widget)
    {
        $this->widget = $widget;
    }

    public function find($slug)
    {
        return $this->Widget->where('slug', $slug)
            ->where('published', true)
            ->first();
    }
}
