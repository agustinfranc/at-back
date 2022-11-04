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

    public static function getOne($id)
    {
        return Assignment::with(['client', 'companion', 'days'])->find($id);
    }

    public static function existPeriodicAssignment($clientId, $companionId)
    {
        return Assignment::where('client_id', $clientId)
            ->where('companion_id', $companionId)
            ->first();
    }
}
