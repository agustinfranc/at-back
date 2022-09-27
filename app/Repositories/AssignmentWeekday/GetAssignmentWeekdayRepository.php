<?php

declare(strict_types=1);

namespace App\Repositories\AssignmentWeekday;

use App\Models\AssignmentWeekday;

class GetAssignmentWeekdayRepository
{
    public static function getAll()
    {
        return AssignmentWeekday::all();
    }
}
