<?php

declare(strict_types=1);

namespace App\Repositories\Assignment;

use App\Models\Assignment;

class ShowAssignmentRepository
{
    public static function show($id)
    {
        return Assignment::with(['client', 'companion', 'days'])->find($id);
    }
}
