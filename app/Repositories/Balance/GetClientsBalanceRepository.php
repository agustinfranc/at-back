<?php

declare(strict_types=1);

namespace App\Repositories\Balance;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Assignment\GetAssignmentRepository;

final class GetClientsBalanceRepository
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
}
