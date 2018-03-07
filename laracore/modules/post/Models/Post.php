<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Supports\Sluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'content', 'admin_id', 'featured_image', 'published', 'pos'
    ];

    public function admin()
    {
        return $this->belongsTo(\Modules\Admin\Models\Admin::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'posts_categories');
    }
}
