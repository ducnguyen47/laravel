<?php
namespace Modules\Core\Contracts\Sluggable;

use Modules\Core\Contracts\Sluggable\SlugRepository as SlugRepositoryContract;

interface SlugManager
{
    public function registerController(string $model, string $controller) : void;

    public function dispatch(SlugRepositoryContract $repository, $slug);
}