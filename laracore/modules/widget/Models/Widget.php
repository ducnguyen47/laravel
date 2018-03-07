<?php

namespace Modules\Widget\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Supports\Sluggable\Sluggable;

class Widget extends Model
{
    use Sluggable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'content', 'published'
    ];
}
