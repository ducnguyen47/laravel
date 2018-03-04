<?php
namespace Modules\Core\Contracts\Breadcrumb;

interface BreadcrumbContract
{
    public function add($label, $url = null);

    public function render();
}