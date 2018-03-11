<?php
namespace Modules\Post\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Modules\Post\Repositories\Post\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($sluggable)
    {
        $post = $this->repository->find($sluggable->object_id);
        $category = $post->categories->isNotEmpty() ? $post->categories()->first() : '';
        $posts_related = $this->repository->getPosts(10, $category->id);
        seo()->add($post);
        breadcrumb()->add($post->name, $post->link);
        theme()->setData('post', $post);
        theme()->setData('posts_related', $posts_related);
        theme()->setTheme('theme::posts.posts.index');
        return theme()->render();
    }
}
