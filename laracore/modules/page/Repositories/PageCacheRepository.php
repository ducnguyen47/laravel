<?php
namespace Modules\Page\Repositories;

class PageCacheRepository implements PageRepository
{
    protected $cache;

    protected $repository;

    public function __construct(PageEloquentRepository $repository)
    {
        $this->repository = $repository;
        $this->cache = app('cache');
    }

    public function find($id)
    {
        return $this->cache->remember('page::'.$id, 150, function () use ($id) {
            return $this->repository->find($id);
        });
    }

    public function all()
    {
        return $this->cache->remember('pages', 150, function () {
            return $this->repository->all();
        });
    }
}
