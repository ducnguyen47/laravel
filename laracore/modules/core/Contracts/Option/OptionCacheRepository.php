<?php

namespace Modules\Core\Contracts\Option;

class OptionCacheRepository implements Option
{
    private $cache;

    protected $repository;

    public function __construct(OptionEloquentRepository $repository)
    {
        $this->repository = $repository;
        $this->cache = app('cache');
    }

    public function save($key, $value)
    {
        return $this->repository->save($key, $value);
    }

    public function get($key)
    {
        return $this->cache->remember('option::'.$key, 150, function () use ($key) {
            return $this->repository->get($key);
        });
    }
}
