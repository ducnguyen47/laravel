<?php
namespace Modules\Core\Supports\Sluggable;

use Modules\Core\Contracts\Sluggable\SlugRepository;
use Modules\Core\Models\Sluggable;

class SluggableEloquentRepository implements SlugRepository
{
    /**
     * @var Sluggable
     */
    protected $sluggable;
    /**
     * SluggableEloquentRepository constructor.
     * @param Sluggable $sluggable
     */
    public function __construct(Sluggable $sluggable)
    {
        $this->sluggable = $sluggable;
    }
    /**
     * Get sluggable by slug.
     * @param  string  $slug
     * @return mixed
     */
    public function getBySlug(string $slug)
    {
        return $this->sluggable->newQuery()->where('slug', $slug)->first();
    }
}