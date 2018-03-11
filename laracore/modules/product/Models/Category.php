<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Supports\Sluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    public $table = 'product_categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'parent_id', 'featured_image', 'published', 'pos'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_categories');
    }

    public function parent()
    {
        return $this->belongsTo($this);
    }

    public function child()
    {
        return $this->hasMany($this, 'parent_id');
    }
}
