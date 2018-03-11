<?php
namespace Modules\Product\Repositories\Product;

use Illuminate\Http\Request;

interface ProductRepository
{
    public function find($id);

    public function getProducts($limit = null, $category = null, $paginate = false, $orderBy = 'latest');

    public function searchs(Request $request);
}