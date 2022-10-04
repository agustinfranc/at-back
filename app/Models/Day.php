<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Day extends Model
{
    public function assignments()
    {
        return $this->belongsToMany(Assignment::class)
            ->withPivot('hours', 'from', 'to')
            ->withTimestamps();
    }
}
