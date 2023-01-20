<?php

declare(strict_types=1);

namespace App\Repositories\Balance;

use App\Models\Assignment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Assignment\GetAssignmentRepository;

final class GetBalanceRepository
{
    public function __construct(
        private readonly GetAssignmentRepository $getRepository,
    ) {
    }

    public function getClientBalances(Collection $clients)
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

    private function getClientTotalDebt($client, $currentDate)
    {
        return $client->rate * self::calculateHours(self::getClientAssignments($client, $currentDate));
    }

    private function getClientTaxableDebt($client, $currentDate)
    {
        return self::getClientTotalDebt($client, $currentDate) * ($client->taxable / 100);
    }

    private function getClientNoTaxDebt($client, $currentDate)
    {
        return self::getClientTotalDebt($client, $currentDate) - self::getClientTaxableDebt($client, $currentDate);
    }

    private function getClientAssignments($client, $currentDate)
    {
        return $this->getRepository::getClientAssignments($client, $currentDate);
    }

    private function calculateHours($assignments): int
    {
        return $assignments->reduce(
            fn ($totalHours, $assignment) =>
            $totalHours + $assignment->hours,
            0
        );
    }

    public function getCompanionBalances(Collection $companions)
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

    private function getCompanionTotalDebt($companion, $currentDate)
    {
        return self::calculateAssignmentsTotal(self::getCompanionAssignments($companion, $currentDate));
    }

    private function getCompanionTaxableDebt($companion, $currentDate)
    {
        if ($companion->max_taxable > self::getCompanionTotalDebt($companion, $currentDate)) {
            return self::getCompanionTotalDebt($companion, $currentDate);
        }
        return $companion->max_taxable;
    }

    private function getCompanionNoTaxDebt($companion, $currentDate)
    {
        if ($companion->max_taxable > self::getCompanionTotalDebt($companion, $currentDate)) {
            return 0;
        }
        return self::getCompanionTotalDebt($companion, $currentDate) - $companion->max_taxable;
    }

    private function getCompanionAssignments($companion, $currentDate)
    {
        return $this->getRepository::getCompanionAssignments($companion, $currentDate);
    }

    private function calculateAssignmentsTotal($assignments): float
    {
        return $assignments->reduce(
            fn ($assignmentTotal, $assignment) =>
            $assignmentTotal + $assignment->client->rate * $assignment->hours,
            0
        );
    }
}
