<?php

namespace Modules\Core\Contracts\Option;

use Modules\Core\Modules\Option;

class OptionCacheRepository implements Option
{
    private $cache;

    protected $repository;

    public function __construct(OptionEloquentRepository $repository)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    public function save($key, $value)
    {
        return $this->repository->save($key, $value);
    }

    public function get($key)
    {
        return $this->cache->remember('option::{$key}', function () use ($key) {
            return $this->repository->get($key);
        });
    }
}
