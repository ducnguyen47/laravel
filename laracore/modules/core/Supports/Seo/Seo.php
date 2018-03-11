<?php
namespace Modules\Core\Supports\Seo;

class Seo
{
    protected $item;

    public function add($value)
    {
        return $this->item = $value;
    }

    public function getTitle()
    {
        return $this->item ? $this->item->name.' - '.option('site_name') : option('site_name');
    }

    public function getDescription()
    {
        return  $this->item ? $this->item->description : option('site_description');
    }

    public function getImage()
    {
        return  $this->item ? $this->item->featured_image : option('site_logo');
    }

    public function getPublishedTime()
    {
        return  $this->item ? $this->item->created_at : now();
    }
}