<?php

declare(strict_types=1);

namespace App\Repositories\AssignmentTemplate;

use App\Models\AssignmentTemplate;
use Illuminate\Database\Eloquent\Collection;

class GetAssignmentTemplateRepository
{
    public static function getAll(): Collection
    {
        return AssignmentTemplate::with(['client', 'companion', 'days'])->get();
    }

    public static function getOne($id): AssignmentTemplate
    {
        return AssignmentTemplate::with(['client', 'companion', 'days'])->findOrFail($id);
    }

    public static function existAssignment($clientId, $companionId): ?AssignmentTemplate
    {
        return AssignmentTemplate::where('client_id', $clientId)
            ->where('companion_id', $companionId)
            ->first();
    }
}
