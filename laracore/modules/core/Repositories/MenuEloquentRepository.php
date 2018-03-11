<?php
namespace Modules\Core\Repositories;

use Modules\Core\Models\Menu;
use Modules\Core\Models\MenuItem;

class MenuEloquentRepository implements MenuRepository
{
    protected $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function find($slug)
    {
        $menu =  $this->menu->where('name', $slug)->first();
        if ($menu) {
            return $menu->items()->where('menu', $menu->id)
                ->where('parent', 0)
                ->orderBy('sort', 'asc')
                ->with('child')
                ->get();
        }
        return null;
    }
}
