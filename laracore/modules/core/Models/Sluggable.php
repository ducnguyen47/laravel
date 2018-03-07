<?php
namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Sluggable extends Model
{
    protected $fillable = ['slug', 'object_id', 'object_type'];

    public $timestamps = false;

    public function sluggable()
    {
        $this->morphTo();
    }
}
