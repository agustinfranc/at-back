<?php

declare(strict_types=1);

namespace App\Repositories\Assignment;

use App\Models\Assignment;
use Illuminate\Database\Eloquent\Collection;

class GetAssignmentRepository
{
    public static function getAll(): Collection
    {
        return Assignment::with(['client', 'companion'])->get();
    }

    public static function getOne($id): ?Assignment
    {
        return Assignment::with(['client', 'companion'])->find($id);
    }

    public static function existPeriodicAssignment($clientId, $companionId): ?Assignment
    {
        return Assignment::where('client_id', $clientId)
            ->where('companion_id', $companionId)
            ->first();
    }

    public static function getClientAssignments($client, $currentDate): Collection
    {
        return Assignment::where('client_id', '=', $client->id)
            ->whereMonth('date', $currentDate)
            ->whereYear('date', $currentDate->year)->get();
    }

    public static function getCompanionAssignments($companion, $currentDate): Collection
    {
        return Assignment::with(['client'])->where('companion_id', '=', $companion->id)
            ->whereMonth('date', $currentDate->month)
            ->whereYear('date', $currentDate->year)->get();
    }
}
