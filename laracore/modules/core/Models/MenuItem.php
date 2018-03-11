<?php
namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    public $table = 'menu_items';

    protected $fillable = ['label', 'link', 'parent', 'sort', 'class', 'menu', 'depth'];

    public function parent()
    {
        return $this->belongsTo($this);
    }

    public function child()
    {
        return $this->hasMany($this, 'parent');
    }
}
