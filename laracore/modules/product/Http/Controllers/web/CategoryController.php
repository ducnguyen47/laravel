<?php
namespace Modules\Product\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Modules\Product\Repositories\Category\CategoryRepository;
use Modules\Product\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index($sluggable)
    {
        $category = $this->categoryRepository->find($sluggable->object_id);
        $products = $this->productRepository->getProducts(20, $category->id, true);
        seo()->add($category);
        breadcrumb()->add($category->name, $category->link);
        theme()->setData('category', $category);
        theme()->setData('products', $products);
        theme()->setTheme('theme::products.categories.index');

        return theme()->render();
    }
}
