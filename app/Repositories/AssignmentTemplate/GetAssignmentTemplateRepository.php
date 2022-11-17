<?php

declare(strict_types=1);

namespace App\Repositories\AssignmentTemplate;

use App\Models\AssignmentTemplate;

class GetAssignmentTemplateRepository
{
    public static function getAll()
    {
        return AssignmentTemplate::with(['client', 'companion', 'days'])->get();
    }

    public static function getOne($id)
    {
        return AssignmentTemplate::with(['client', 'companion', 'days'])->find($id);
    }

    public static function existAssignment($clientId, $companionId)
    {
        return AssignmentTemplate::where('client_id', $clientId)
            ->where('companion_id', $companionId)
            ->first();
    }
}
