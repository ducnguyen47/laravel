<?php

namespace Modules\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Supports\Sluggable\Sluggable;

class Page extends Model
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
}
