<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function assignmentTemplates()
    {
        return $this->belongsToMany(AssignmentTemplate::class)
            ->withPivot('hours', 'from', 'to')
            ->withTimestamps();
    }
}
