<?php
namespace Modules\Core\Contracts\Template;

interface TemplateContract
{
    public function setTheme($view);

    public function setViewExtend($view);

    public function setTitle($title);

    public function setData($name, $value = null);

    public function render();
}