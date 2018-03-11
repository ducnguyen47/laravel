<?php
namespace Modules\Page\Repositories;

use Modules\Page\Models\Page;

class PageEloquentRepository implements PageRepository
{
    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function find($id)
    {
        return $this->page->where('id', $id)
            ->where('published', true)
            ->with('sluggable')
            ->firstOrFail();
    }

    public function all()
    {
        return $this->page->where('published', true)
            ->with('sluggable')
            ->latest('pos')
            ->get();
    }
}
