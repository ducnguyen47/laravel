<?php
namespace Modules\Page\Repositories;

interface PageRepository
{
    public function find($id);

    public function all();
}