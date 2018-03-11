<?php
namespace Modules\Product\Repositories\Product;

class ProductCacheRepository implements ProductRepository
{
    protected $cache;

    protected $repository;

    public function __construct(ProductEloquentRepository $repository)
    {
        $this->repository = $repository;
        $this->cache = app('cache');
    }

    public function find($id)
    {
        return $this->cache->remember('product::'.$id, 150, function () use ($id) {
            return $this->repository->find($id);
        });
    }

    public function getProducts($limit = null, $category = null, $paginate = false, $orderBy = 'latest')
    {
        return $this->cache->remember('product::'.$limit.$category.$paginate, 150, function () use ($limit, $category, $paginate, $orderBy) {
            return $this->repository->getProducts($limit, $category, $paginate, $orderBy);
        });
    }
}
