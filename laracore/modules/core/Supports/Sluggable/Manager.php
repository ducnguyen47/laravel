<?php
namespace Modules\Core\Supports\Sluggable;

use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Modules\Core\Contracts\Sluggable\SlugManager as SlugManagerContract;
use Modules\Core\Contracts\Sluggable\SlugRepository;

class Manager implements SlugManagerContract
{
    /**
     * @var array
     */
    protected $sluggables = [];
    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;
    /**
     * SlugManager constructor.
     * @param \Illuminate\Contracts\Foundation\Application $application
     */
    public function __construct(Application $application)
    {
        $this->app = $application;
    }
    /**
     * Register controller.
     * @param string $model
     * @param string $controller
     */
    public function registerController(string $model, string $controller) : void
    {
        $this->sluggables[$model] = $controller;
    }
    /**
     * Find controller and model, then dispatch it.
     *
     * @param  SluggableRepository $repository
     * @param  string  $slug
     * @return mixed
     */
    public function dispatch(SlugRepository $repository, $slug)
    {
        $sluggable  = $repository->getBySlug($slug);
        if (!$slug || !$sluggable || ! isset($this->sluggables[$sluggable->object_type])) {
            throw new HttpException(404, 'Slug is not found.');
        }

        return $this->app->call($this->sluggables[$sluggable->object_type], [$sluggable]);
    }
}