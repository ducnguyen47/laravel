<?php
namespace Modules\Product\Http\Controllers\Admin;

use Modules\Product\Models\Product;
use Modules\Product\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('sluggable')->get();
        breadcrumb()->add(trans('product::language.product'), route('products.index'));
        breadcrumb()->add(trans('core::language.list'));
        theme()->setTitle(trans('product::language.product'));
        theme()->setTheme('product::product.index');
        theme()->setData('products', $products);

        return theme()->render();
    }

    public function create()
    {
        breadcrumb()->add(trans('product::language.product'), route('products.index'));
        breadcrumb()->add(trans('core::language.create'));
        theme()->setTitle(trans('product::language.product'));
        theme()->setTheme('product::product.create');
        theme()->setData('maxPos', Product::max('pos'));
        theme()->setData('categories', Category::query()->select('id', 'name')->get());
        return theme()->render();
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules($request));
        $data = $request->all();
        $data['admin_id'] = $request->user()->id;
        $product = new product($data);
        $product->save();
        $product->categories()->sync($data['categories']);
        $product->saveSlug($data['name']);

        flash(trans('core::language.add_success'))->success();
        return back();
    }

    public function edit(Product $product)
    {
        breadcrumb()->add(trans('product::language.product'), route('products.index'));
        breadcrumb()->add(trans('core::language.edit'));
        theme()->setTitle(trans('product::language.product'));
        theme()->setData('categories', Category::query()->select('id', 'name')->get());
        theme()->setData('product', $product->load('categories'));
        theme()->setData('maxPos', $product->max('pos'));
        theme()->setTheme('product::product.edit');
        return theme()->render();
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        if (!$request->wantsJson()) {
            $this->validate($request, $this->rules($request, $product));
            $data['published'] = $request->has('published') ? true : false;
            $product->saveSlug($data['name']);
        }
        $product->update($data);
        if ($request->has('categories')) {
            $product->categories()->sync($data['categories']);
        }

        flash(trans('core::language.update_success'))->success();
        if ($request->wantsJson()) {
            return response()->json([], 200);
        }
        return back();
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();
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
