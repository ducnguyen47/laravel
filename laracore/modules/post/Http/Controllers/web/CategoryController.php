<?php
namespace Modules\Post\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Modules\Post\Repositories\Category\CategoryRepository;
use Modules\Post\Repositories\Post\PostRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $postRepository;
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository, PostRepository $postRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    public function index($sluggable)
    {
        $category = $this->categoryRepository->find($sluggable->object_id);
        $posts = $this->postRepository->getPosts(20, $category->id, true);
        seo()->add($category);
        breadcrumb()->add($category->name, $category->link);
        theme()->setData('category', $category);
        theme()->setData('posts', $posts);
        theme()->setTheme('theme::posts.categories.index');
        return theme()->render();
    }
}
