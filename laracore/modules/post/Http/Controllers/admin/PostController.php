<?php
namespace Modules\Post\Http\Controllers\Admin;

use Modules\Post\Models\Post;
use Modules\Post\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('sluggable')->get();
        breadcrumb()->add(trans('post::language.post'), route('posts.index'));
        breadcrumb()->add(trans('core::language.list'));
        theme()->setTitle(trans('post::language.post'));
        theme()->setTheme('post::post.index');
        theme()->setData('posts', $posts);

        return theme()->render();
    }

    public function create()
    {
        breadcrumb()->add(trans('post::language.post'), route('posts.index'));
        breadcrumb()->add(trans('core::language.create'));
        theme()->setTitle(trans('post::language.post'));
        theme()->setTheme('post::post.create');
        theme()->setData('maxPos', post::max('pos'));
        theme()->setData('categories', Category::query()->select('id', 'name')->get());
        return theme()->render();
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules($request));
        $data = $request->all();
        $data['admin_id'] = $request->user()->id;
        $post = new post($data);
        $post->save();
        $post->categories()->sync($data['categories']);
        $post->saveSlug($data['name']);

        flash(trans('core::language.add_success'))->success();
        return back();
    }

    public function edit(Post $post)
    {
        breadcrumb()->add(trans('post::language.post'), route('posts.index'));
        breadcrumb()->add(trans('core::language.edit'));
        theme()->setTitle(trans('post::language.post'));
        theme()->setData('categories', Category::query()->select('id', 'name')->get());
        theme()->setData('post', $post->load('categories'));
        theme()->setData('maxPos', $post->max('pos'));
        theme()->setTheme('post::post.edit');
        return theme()->render();
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        if (!$request->wantsJson()) {
            $this->validate($request, $this->rules($request, $post));
            $data['published'] = $request->has('published') ? true : false;
            $post->saveSlug($data['name']);
        }
        $post->update($data);
        if ($request->has('categories')) {
            $post->categories()->sync($data['categories']);
        }

        flash(trans('core::language.update_success'))->success();
        if ($request->wantsJson()) {
            return response()->json([], 200);
        }
        return back();
    }

    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        flash(trans('core::language.delete_success'))->success();
        if ($request->wantsJson()) {
            return response()->json([], 200);
        }
        return back();
    }
    protected function rules($request, $item = null)
    {
        return [
            'name' => 'required|max:191',
            'categories' => 'required'
        ];
    }
}
