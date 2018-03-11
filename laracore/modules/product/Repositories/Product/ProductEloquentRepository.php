<?php
namespace Modules\Product\Repositories\Product;

use Modules\Product\Models\Product;
use Illuminate\Http\Request;

class ProductEloquentRepository implements ProductRepository
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->where('id', $id)
            ->where('published', true)
            ->with(['sluggable', 'categories'])
            ->firstOrFail();
    }

    public function getProducts($limit = null, $category = null, $paginate = false, $orderBy = 'latest')
    {
        $query = $this->model->query();
        $query->with(['sluggable', 'categories']);

        if ($category) {
            $query->whereHas('categories', function ($q) use ($category) {
                $q->where('id', $category);
            });
        }

        switch ($orderBy) {
            case 'latest':
                $query->latest('pos');
                break;
            
            default:
                $query->oldest('pos');
                break;
        }

        return $limit ? $paginate ? $query->paginate($limit) : $query->limit($limit)->get() : $query->get();
    }

    public function searchs(Request $request)
    {
        $query = $this->model->query();
        if ($request->category) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        if ($request->q) {
            $query->where('name', 'LIKE', '%'.$request->q.'%');
        }

        return $query->latest('pos')->paginate(20);
    }
}
