<?php

declare(strict_types=1);

namespace App\Repositories\Balance;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Assignment\GetAssignmentRepository;

final class GetCompanionsBalanceRepository
{
    public function __construct(
        private readonly GetAssignmentRepository $getRepository,
    ) {
    }

    public function getCompanionBalances(Collection $companions)
    {
        $currentDate = Carbon::parse(date("Y-m-d"));

        return $companions
            ->filter(fn ($companion) => self::getCompanionTotalDebt($companion, $currentDate) > 0)
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
            $assignmentTotal + $assignment->client->companion_rate * $assignment->hours,
            0
        );
    }
}
