<?php

namespace App\Repositories\Assignment;

use App\Models\Assignment;
use Illuminate\Support\Collection;

class StoreAssigmentRepository 
{
    public static function store(Collection $assignment)
    {
        return Assignment::updateOrCreate($assignment->all());
    }
}