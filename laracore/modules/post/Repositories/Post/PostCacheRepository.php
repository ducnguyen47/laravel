<?php
namespace Modules\Post\Repositories\Post;

class PostCacheRepository implements PostRepository
{
    protected $cache;

    protected $repository;

    public function __construct(PostEloquentRepository $repository)
    {
        $this->repository = $repository;
        $this->cache = app('cache');
    }

    public function find($id)
    {
        return $this->cache->remember('post::'.$id, 150, function () use ($id) {
            return $this->repository->find($id);
        });
    }

    public function getPosts($limit = null, $category = null, $paginate = false, $orderBy = 'latest')
    {
        return $this->cache->remember('posts::'.$limit.$category.$paginate, 150, function () use ($limit, $category, $paginate, $orderBy) {
            return $this->repository->getPosts($limit, $category, $paginate, $orderBy);
        });
    }
}
