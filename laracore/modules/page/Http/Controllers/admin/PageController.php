<?php
namespace Modules\Page\Http\Controllers\Admin;

use Modules\Page\Models\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::with('sluggable')->get();
        breadcrumb()->add(trans('page::language.page'), route('pages.index'));
        breadcrumb()->add(trans('core::language.list'));

        theme()->setTitle(trans('page::language.page'));
        theme()->setTheme('page::page.index');
        theme()->setData('pages', $pages);

        return theme()->render();
    }

    public function create()
    {
        breadcrumb()->add(trans('page::language.page'), route('pages.index'));
        breadcrumb()->add(trans('core::language.create'));
        theme()->setTitle(trans('page::language.page'));
        theme()->setTheme('page::page.create');
        theme()->setData('maxPos', Page::max('pos'));
        return theme()->render();
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules($request));
        $data = $request->all();
        $data['admin_id'] = $request->user()->id;
        $page = new Page($data);
        $page->save();
        $page->saveSlug($data['name']);

        flash(trans('core::language.add_success'))->success();
        return back();
    }

    public function edit(Page $page)
    {
        breadcrumb()->add(trans('page::language.page'), route('pages.index'));
        breadcrumb()->add(trans('core::language.edit'));
        theme()->setTitle(trans('page::language.page'));
        theme()->setTheme('page::page.edit');
        theme()->setData('page', $page);
        theme()->setData('maxPos', $page->max('pos'));
        return theme()->render();
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->all();
        if (!$request->wantsJson()) {
            $this->validate($request, $this->rules($request, $page));
            $data['published'] = $request->has('published') ? true : false;
            $page->saveSlug($data['name']);
        }
        $page->update($data);

        flash(trans('core::language.update_success'))->success();
        if ($request->wantsJson()) {
            return response()->json([], 200);
        }
        return back();
    }

    public function destroy(Request $request, Page $page)
    {
        $page->delete();
        flash(trans('core::language.delete_success'))->success();
        if ($request->wantsJson()) {
            return response()->json([], 200);
        }
        return back();
    }
    protected function rules($request, $item = null)
    {
        return [
            'name' => 'required|max:191'
        ];
    }
}
