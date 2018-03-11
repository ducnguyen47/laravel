<?php

function get_product_categories($parent = 0, $limit = null, $orderBy = 'latest')
{
    return app()->make(Modules\Product\Repositories\Category\CategoryRepository::class)->getCategories($parent, $limit, $orderBy);
}