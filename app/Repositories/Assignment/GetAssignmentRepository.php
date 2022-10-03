<?php

declare(strict_types=1);

namespace App\Repositories\Assignment;

use App\Models\Assignment;

class GetAssignmentRepository
{
    public static function getAll()
    {
        return Assignment::with(['client', 'companion', 'days'])->get();
    }

    public static function existPeriodicAssignment($clientId, $companionId)
    {
        return Assignment::where('client_id', $clientId)
            ->where('companion_id', $companionId)
            ->where('periodic', 1)
            ->first();
    }
}
