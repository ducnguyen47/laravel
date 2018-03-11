<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Supports\Sluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    public $table = 'post_categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'parent_id', 'featured_image', 'published', 'pos'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_categories');
    }

    public function parent()
    {
        return $this->belongsTo($this, 'parent_id');
    }

    public function child()
    {
        return $this->hasMany($this, 'id');
    }
}
