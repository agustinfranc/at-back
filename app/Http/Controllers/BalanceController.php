<?php

namespace App\Http\Controllers;

use App\Repositories\Assignment\GetAssignmentRepository;
use App\Repositories\Balance\GetClientsBalanceRepository;
use App\Repositories\Balance\GetCompanionsBalanceRepository;
use App\Repositories\Client\GetClientRepository;
use App\Repositories\Companion\GetCompanionRepository;
use Illuminate\Support\Collection;

final class BalanceController extends Controller
{
    public function __construct(
        private readonly GetAssignmentRepository $getAssignmentRepository,
        private readonly GetClientRepository $getClientRepository,
        private readonly GetCompanionRepository $getCompanionRepository,
        private readonly GetClientsBalanceRepository $getClientsBalanceRepository,
        private readonly GetCompanionsBalanceRepository $getCompanionsBalanceRepository,
    ) {
    }

    public function getClientsBalance(): Collection
    {
        return $this->getClientsBalanceRepository->getClientBalances($this->getClientRepository::getAll());
    }

    public function getCompanionsBalance(): Collection
    {
        return $this->getCompanionsBalanceRepository->getCompanionBalances($this->getCompanionRepository::getAll());
    }
}
