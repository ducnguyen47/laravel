<?php
namespace Modules\Post\Repositories\Post;

interface PostRepository
{
    public function find($id);

    public function getPosts($limit = null, $category = null, $paginate = false, $orderBy = 'latest');
}