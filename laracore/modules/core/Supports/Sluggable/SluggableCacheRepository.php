<?php
namespace Modules\Core\Supports\Sluggable;

use Modules\Core\Contracts\Sluggable\SlugRepository;

class SluggableCacheRepository implements SlugRepository
{
    /**
     * @var \Illuminate\Contracts\Cache\Repository
     */
    private $cache;
    /**
     * @var Repository
     */
    protected $repository;
    
    public function __construct(SlugRepository $repository)
    {
        $this->repository = $repository;
        $this->cache = app('cache');
    }
    /**
     * Get sluggable by slug.
     * @param  string $slug
     * @return mixed
     */
    public function getBySlug(string $slug)
    {
        return $this->cache->remember("sluggables::".$slug, 150, function () use ($slug) {
            return $this->repository->getBySlug($slug);
        });
    }
}