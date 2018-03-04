<?php
namespace Modules\Core\Contracts\Breadcrumb;

class Breadcrumb implements BreadcrumbContract
{

    protected $breadcrumbs = [];
    
    public function add($label, $link = null)
    {
        return $this->breadcrumbs[] = ['label' => $label, 'link' => $link];
    }

    public function render()
    {
        return $this->breadcrumbs;
    }
}
