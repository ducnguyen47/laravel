<?php
namespace Modules\Post\Repositories\Post;

use Modules\Post\Models\Post;

class PostEloquentRepository implements PostRepository
{
    protected $model;

    public function __construct(Post $model)
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

    public function getPosts($limit = null, $category = null, $paginate = false, $orderBy = 'latest')
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
}