<?php
namespace Modules\Product\Http\Controllers\Admin;

use Modules\Product\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('sluggable')->get();
        breadcrumb()->add(trans('product::language.product_category'), route('product.categories.index'));
        breadcrumb()->add(trans('core::language.list'));

        theme()->setTitle(trans('product::language.product_category'));
        theme()->setTheme('product::category.index');
        theme()->setData('categories', $categories);

        return theme()->render();
    }

    public function create()
    {
        breadcrumb()->add(trans('product::language.product_category'), route('product.categories.index'));
        breadcrumb()->add(trans('core::language.create'));
        theme()->setTitle(trans('product::language.product_category'));
        theme()->setTheme('product::category.create');
        theme()->setData('maxPos', Category::max('pos')+1);
        theme()->setData('categories', Category::query()->select('id', 'name')->get());
        return theme()->render();
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules($request));
        $data = $request->all();
        $data['admin_id'] = $request->user()->id;
        $category = new category($data);
        $category->save();
        $category->saveSlug($data['name']);

        flash(trans('core::language.add_success'))->success();
        return back();
    }

    public function edit(Category $category)
    {
        breadcrumb()->add(trans('product::language.product_category'), route('product.categories.index'));
        breadcrumb()->add(trans('core::language.edit'));
        theme()->setTitle(trans('product::language.product_category'));
        theme()->setTheme('product::category.edit');
        theme()->setData('category', $category);
        theme()->setData('maxPos', Category::max('pos')+1);
        theme()->setData('categories', Category::query()->select('id', 'name')->get());
        return theme()->render();
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        if (!$request->wantsJson()) {
            $this->validate($request, $this->rules($request, $category));
            $data['published'] = $request->has('published') ? true : false;
            $category->saveSlug($data['name']);
        }
        $category->update($data);

        flash(trans('core::language.update_success'))->success();
        if ($request->wantsJson()) {
            return response()->json([], 200);
        }
        return back();
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();
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
