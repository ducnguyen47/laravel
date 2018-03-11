<?php
namespace Modules\Widget\Repositories;

class WidgetCacheRepository implements WidgetRepository
{
    protected $cache;

    protected $repository;

    public function __construct(WidgetEloquentRepository $repository)
    {
        $this->repository = $repository;
        $this->cache = app('cache');
    }

    public function find($slug)
    {
        return $this->cache->remember('widget::'.$slug, 150, function () use ($slug) {
            return $this->repository->find($slug);
        });
    }
}
