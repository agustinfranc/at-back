<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignmentTemplateDay extends Pivot
{
    use HasFactory, SoftDeletes;

    public $incrementing = true;
}
