<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Question extends Model
{
    use HasFactory, Userstamps;
    protected $guarded = ['id'];

    public function getStatusAttribute()
    {
        if ($this->attributes['status'] == true) {
            return 'Active';
        } else {
            return 'Deactivate';
        }
    }
    public function scopeActive($query)
    {
        
        return $query->where('expire_date', '>=', Carbon::today());
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function examinations()
    {
        return $this->hasMany(Examination::class);
    }
}
