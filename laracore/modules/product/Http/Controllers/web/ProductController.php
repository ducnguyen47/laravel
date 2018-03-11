<?php
namespace Modules\Product\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Modules\Product\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($sluggable)
    {
        $product = $this->repository->find($sluggable->object_id);
        $category = $product->categories->isNotEmpty() ? $product->categories()->first() : '';
        $products_related = $this->repository->getProducts(2, $category->id);
        seo()->add($product);
        breadcrumb()->add($product->name, $product->link);
        theme()->setTheme('theme::products.products.index');
        theme()->setData('product', $product);
        
        return theme()->render();
    }

    public function search(Request $request)
    {
        $products = $this->repository->searchs($request);
        breadcrumb()->add('Tìm kiếm sản phẩm');
        theme()->setTheme('theme::products.products.search');
        theme()->setData('products', $products);

        return theme()->render();
    }
}
