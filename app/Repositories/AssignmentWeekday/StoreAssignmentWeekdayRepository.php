<?php

declare(strict_types=1);

namespace App\Repositories\AssignmentWeekday;

use App\Models\AssignmentWeekday;
use Illuminate\Support\Collection;

class StoreAssigmentWeekdayRepository 
{
    public static function store(Collection $assignmentWeekday)
    {
        return AssignmentWeekday::updateOrCreate($assignmentWeekday->all());
    }
}