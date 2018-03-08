<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Supports\Sluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'content', 'admin_id', 'featured_image', 'published', 'pos', 'images', 'price', 'discount', 'sku'
    ];

    protected $casts = [
        'images' => 'json'
    ];

    public function admin()
    {
        return $this->belongsTo(\Modules\Admin\Models\Admin::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }
}
