<?php
namespace Modules\Core\Contracts\Template;

use Exception;

class Template implements TemplateContract
{
    protected $view;

    protected $viewExtend = 'core::layouts.app';

    protected $data = [];
    
    public function setTheme($view)
    {
        if (view()->exists($view)) {
            return $this->view = $view;
        }
        throw new Exception('View does not exists.Please contact nguyenhoangminhduc47@gmail.com');
    }

    public function setViewExtend($view)
    {
        return $this->viewExtend = $view;
    }

    public function setTitle($title)
    {
        return $this->data['title'] = $title;
    }

    public function setData($name, $value = null)
    {
        if (is_array($name)) {
            foreach ($name as $key => $value) {
                $this->data[$key] = $value;
            }
            return $this->data;
        }
        return $this->data[$name] = $value;
    }

    public function render()
    {
        $this->data['viewExtend'] = $this->viewExtend;
        return view($this->view, $this->data);
    }
}
