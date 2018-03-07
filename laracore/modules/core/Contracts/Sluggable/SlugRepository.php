<?php
namespace Modules\Core\Contracts\Sluggable;

interface SlugRepository
{
    public function getBySlug(string $slug);
}