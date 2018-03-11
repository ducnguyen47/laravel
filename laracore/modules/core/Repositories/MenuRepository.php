<?php
namespace Modules\Core\Repositories;

interface MenuRepository
{
    public function find($slug);
}