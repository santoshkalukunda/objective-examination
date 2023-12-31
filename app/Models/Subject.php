<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Wildside\Userstamps\Userstamps;

class Subject extends Model
{
    use HasFactory, Userstamps, HasSlug;
    protected $guarded = ['id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getStatusAttribute()
    {
        if ($this->attributes['status'] == true) {
            return 'Active';
        } else {
            return 'Deactivate';
        }
    }
    public function scopeActived($query)
    {
        return $query->where('status', true);
    }

    public function scopeDeactives($query)
    {
        return $query->where('status', false);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
