<?php
namespace Modules\Post\Repositories\Category;

use Modules\Post\Models\Category;

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
            ->with(['sluggable', 'posts'])
            ->firstOrFail();
    }

    public function getViaParent($parent = 0, $limit = null, $orderBy = 'latest')
    {
        $query = $this->model->query();
        $query->with(['sluggable', 'child', 'products']);
        if ($parent) {
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

        if ($limit) {
            $query->limit($limit);
        }

        return $query->get();
    }
}