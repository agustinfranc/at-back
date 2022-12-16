<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateMigration extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function assignmentTemplate()
    {
        return $this->belongsTo(AssignmentTemplate::class);
    }
}
