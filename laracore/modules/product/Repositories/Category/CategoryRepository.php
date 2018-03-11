<?php
namespace Modules\Product\Repositories\Category;

interface CategoryRepository
{
    public function find($id);

    public function getCategories($parent = 0, $limit = null, $orderBy = 'latest');
}