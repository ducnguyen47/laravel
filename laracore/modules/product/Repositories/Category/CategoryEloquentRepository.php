<?php
namespace Modules\Product\Repositories\Category;

use Modules\Product\Models\Category;

class CategoryEloquentRepository implements CategoryRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->where('id', $id)
            ->where('published', true)
            ->with(['sluggable', 'products'])
            ->firstOrFail();
    }

    public function getCategories($parent = 0, $limit = null, $orderBy = 'latest')
    {
        $query = $this->model->query();
        $query->with(['sluggable', 'child']);
        if ($parent >= 0) {
            $query->where('parent_id', $parent);
        }

        switch ($orderBy) {
            case 'latest':
                $query->latest('pos');
                break;
            
            default:
                $query->oldest('pos');
                break;
        }

        return $limit ? $query->limit($limit)->get() : $query->get();
    }
}
