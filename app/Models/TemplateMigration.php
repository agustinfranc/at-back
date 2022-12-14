<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TemplateMigration extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function assignmentTemplate()
    {
        return $this->belongsTo(AssignmentTemplate::class);
    }
}
