<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Day extends Model
{
    use HasFactory, SoftDeletes;

    public function assignments()
    {
        return $this->belongsToMany(Assignment::class)
            ->withPivot('hours', 'from', 'to')
            ->withTimestamps();
    }

    public function day_type()
    {
        return $this->belongsTo(DayType::class);
    }
}
