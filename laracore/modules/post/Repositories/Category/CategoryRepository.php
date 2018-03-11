<?php
namespace Modules\Post\Repositories\Category;

interface CategoryRepository
{
    public function find($id);

    public function getViaParent($parent = 0, $limit = null, $orderBy = 'latest');
}