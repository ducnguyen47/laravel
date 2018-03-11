<?php
namespace Modules\Core\Repositories;

class MenuCacheRepository implements MenuRepository
{
    protected $cache;

    protected $repository;

    public function __construct(MenuEloquentRepository $repository)
    {
        $this->repository = $repository;
        $this->cache = app('cache');
    }

    public function find($slug)
    {
        return $this->cache->remember('menu::'.$slug, 150, function () use ($slug) {
            return $this->repository->find($slug);
        });
    }
}
