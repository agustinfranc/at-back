<?php

declare(strict_types=1);

namespace App\Repositories\Balance;

use App\Models\Assignment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Assignment\GetAssignmentRepository;

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
                    'taxable_debt' => (self::getClientTaxableDebt($client, $currentDate)),
                    'no_tax_debt' => (self::getClientNoTaxDebt($client, $currentDate))
                ]
            )->values();
    }

    private static function getClientTotalDebt($client, $currentDate)
    {
        return $client->rate * self::calculateHours(self::getClientAssignments($client, $currentDate));
    }

    private static function getClientTaxableDebt($client, $currentDate)
    {
        return self::getClientTotalDebt($client, $currentDate) * ($client->taxable / 100);
    }

    private static function getClientNoTaxDebt($client, $currentDate)
    {
        return self::getClientTotalDebt($client, $currentDate) - self::getClientTaxableDebt($client, $currentDate);
    }

    private static function getClientAssignments($client, $currentDate)
    {
        return Assignment::where('client_id', '=', $client->id)->whereMonth('date', $currentDate)->whereYear('date', $currentDate->year)->get();
    }

    private static function calculateHours($assignments): int
    {
        return $assignments->reduce(
            fn ($totalHours, $assignment) =>
            $totalHours + $assignment->hours,
            0
        );
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
                    'taxable_debt' => self::getCompanionTaxableDebt($companion, $currentDate),
                    'no_tax_debt' => self::getCompanionNoTaxDebt($companion, $currentDate),
                ]
            )->values();
    }

    private static function getCompanionTotalDebt($companion, $currentDate)
    {
        return self::calculateAssignmentsTotal(self::getCompanionAssignments($companion, $currentDate));
    }

    private static function getCompanionTaxableDebt($companion, $currentDate)
    {
        if ($companion->max_taxable > self::getCompanionTotalDebt($companion, $currentDate)) {
            return self::getCompanionTotalDebt($companion, $currentDate);
        }
        return $companion->max_taxable;
    }

    private static function getCompanionNoTaxDebt($companion, $currentDate)
    {
        if ($companion->max_taxable > self::getCompanionTotalDebt($companion, $currentDate)) {
            return 0;
        }
        return self::getCompanionTotalDebt($companion, $currentDate) - $companion->max_taxable;
    }

    private static function getCompanionAssignments($companion, $currentDate)
    {
        return Assignment::with(['client'])->where('companion_id', '=', $companion->id)->whereMonth('date', $currentDate->month)->whereYear('date', $currentDate->year)->get();
    }

    private static function calculateAssignmentsTotal($assignments): float
    {
        return $assignments->reduce(
            fn ($assignmentTotal, $assignment) =>
            $assignmentTotal + $assignment->client->rate * $assignment->hours,
            0
        );
    }
}
