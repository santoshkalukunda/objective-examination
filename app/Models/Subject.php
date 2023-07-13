<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Subject extends Model
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
    public function scopeActived($query)
    {
        return $query->where('status', true);
    }

    public function scopeDeactives($query)
    {
        return $query->where('status', false);
    }

}
