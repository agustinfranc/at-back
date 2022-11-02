<?php

namespace App\Http\Controllers;

use App\Repositories\Assignment\GetAssignmentRepository;
use App\Repositories\Balance\GetBalanceRepository;
use App\Repositories\Client\GetClientRepository;
use App\Repositories\Companion\GetCompanionRepository;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function __construct(
        private readonly GetAssignmentRepository $getAssignmentRepository,
        private readonly GetClientRepository $getClientRepository,
        private readonly GetCompanionRepository $getCompanionRepository,
        private readonly GetBalanceRepository $getBalanceRepository,
    ) {
    }

    public function getClientsBalance() {
        return $this->getBalanceRepository::getClientBalances($this->getClientRepository::getAll());
    }

    public function getCompanionsBalance() {
        return $this->getBalanceRepository::getCompanionBalances($this->getCompanionRepository::getAll());
    }
}
