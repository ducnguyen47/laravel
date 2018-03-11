<?php
namespace Modules\Product\Repositories\Category;

class CategoryCacheRepository implements CategoryRepository
{
    protected $cache;

    protected $repository;

    public function __construct(CategoryEloquentRepository $repository)
    {
        $this->repository = $repository;
        $this->cache = app('cache');
    }

    public function find($id)
    {
        return $this->cache->remember('product.category::'.$id, 150, function () use ($id) {
            return $this->repository->find($id);
        });
    }

    public function getCategories($parent = 0, $limit = null, $orderBy = 'latest')
    {
        return $this->cache->remember('product.categories::'.$parent, 150, function () use ($parent, $limit, $orderBy) {
            return $this->repository->getCategories($parent, $limit, $orderBy);
        });
    }
}
