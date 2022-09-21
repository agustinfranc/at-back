<?php

declare(strict_types=1);

namespace App\Repositories\Assignment;

use App\Models\Assignment;

class GetAssignmentRepository
{
    public static function getAll()
    {
        return Assignment::all();
    }
}
