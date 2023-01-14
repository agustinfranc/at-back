<?php

declare(strict_types=1);

namespace App\Repositories\Balance;

use App\Models\Assignment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

final class GetBalanceRepository
{
    public static function getClientBalances(Collection $clients)
    {
        $currentDate = Carbon::parse(date("Y-m-d"));

        return $clients
            ->filter(fn ($client) => self::calculateHours(self::getClientAssignments($client, $currentDate)) > 0)
            ->map(
                fn ($client) =>
                [
                    'name' => $client->name,
                    'debt' => ($client->rate * self::calculateHours(self::getClientAssignments($client, $currentDate)))
                ]
            )->values();
    }

    //llevarlo al repo de assignment
    private static function getClientAssignments($client, $current)
    {
        return Assignment::where('client_id', '=', $client->id)->whereMonth('date', $current)->whereYear('date', $current->year)->get();
    }

    private static function calculateHours($assignments): int
    {
        if ($assignments->isEmpty()) {
            return 0;
        }

        return $assignments->reduce(function ($totalHours, $assignment) {
            return $totalHours + $assignment->hours;
        });
    }

    public static function getCompanionBalances(Collection $companions)
    {
        $currentDate = Carbon::parse(date("Y-m-d"));

        return $companions
            ->filter(fn ($companion) => self::calculateAssignmentsTotal(self::getCompanionAssignments($companion, $currentDate)) > 0)
            ->map(
                fn ($companion) =>
                [
                    'name' => $companion->name,
                    'debt' => self::calculateAssignmentsTotal(self::getCompanionAssignments($companion, $currentDate))
                ]
            )->values();
    }

    //llevar al repo de assignment
    private static function getCompanionAssignments($companion, $current)
    {
        return Assignment::with(['client'])->where('companion_id', '=', $companion->id)->whereMonth('date', $current->month)->whereYear('date', $current->year)->get();
    }

    private static function calculateAssignmentsTotal($assignments): float
    {
        if ($assignments->isEmpty()) {
            return 0;
        }

        return $assignments->reduce(function ($assignmentTotal, $assignment) {
            return $assignmentTotal + $assignment->client->rate * $assignment->hours;
        });
    }
}
