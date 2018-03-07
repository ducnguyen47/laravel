<?php

namespace Modules\Core\Supports\Sluggable;

use Modules\Core\Models\Sluggable as SluggableModel;

trait Sluggable
{
    public static function boot()
    {
        static::deleted(function ($model) {
            $model->sluggable()->delete();
        });
    }

    public function createUniqueSlug($value)
    {
        if (! $value) {
            return;
        }
        if (SluggableModel::query()
            ->where('slug', $slug = makeSlug($value))
            ->exists()) {
            $slug = "{$slug}-{$this->id}";
        }
        return $slug;
    }

    public function saveSlug($slug)
    {
        if ($sluggable = $this->sluggable()->first()) {
            return $sluggable->update(['slug' => $this->createUniqueSlug($slug)]);
        }
        return $this->sluggable()->create([
            'slug' => $this->createUniqueSlug($slug)
        ]);
    }

    public function sluggable()
    {
        return $this->morphOne(\Modules\Core\Models\Sluggable::class, 'sluggable', 'object_type', 'object_id');
    }

    public function getLinkAttribute()
    {
        return $this->sluggable ? route('sluggable', $this->sluggable->slug) : '#';
    }
}