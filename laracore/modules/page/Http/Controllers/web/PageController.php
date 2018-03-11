<?php
namespace Modules\Page\Http\Controllers\Web;

use Modules\Page\Models\Page;
use App\Http\Controllers\Controller;
use Modules\Page\Repositories\PageRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $repository;

    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($sluggable)
    {
        $page = $this->repository->find($sluggable->object_id);
        seo()->add($page);
        breadcrumb()->add($page->name, $page->link);
        theme()->setTheme('theme::pages.index');
        theme()->setData('page', $page);
        return theme()->render();
    }
}
