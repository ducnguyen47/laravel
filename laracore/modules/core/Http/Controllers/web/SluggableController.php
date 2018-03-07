<?php
namespace Modules\Core\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Modules\Core\Contracts\Sluggable\SlugManager;

class SluggableController extends Controller
{
    /**
     * @var \Modules\Core\Contracts\Sluggable\SlugManager
     */
    protected $sluggable;
    /**
     * SluggableController constructor.
     * @param \Modules\Core\Contracts\Sluggable\SlugManager $sluggable
     */
    public function __construct(SlugManager $sluggable)
    {
        $this->sluggable = $sluggable;
    }
    /**
     * Slug dispatch.
     *
     * @param $slug
     * @return mixed
     */
    public function index($slug)
    {
        return app()->call([$this->sluggable, 'dispatch'], [$slug]); 
    }
}