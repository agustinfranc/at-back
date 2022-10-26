<?php

namespace App\Http\Controllers;

use App\Repositories\Assignment\GetAssignmentRepository;
use App\Repositories\Client\GetClientRepository;
use App\Repositories\Companion\GetCompanionRepository;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function __construct(
        private readonly GetAssignmentRepository $getAssignmentRepository,
        private readonly GetClientRepository $getClientRepository,
        private readonly GetCompanionRepository $getCompanionRepository
    ) {
    }

    public function getClientsBalance() {
        $assignments = $this->getAssignmentRepository::getAll();
        $clientsBalances = collect();
        foreach($assignments as $assignment){
            foreach($assignment->days as $day){
                $total =+ $day->pivot->hours;
            }
            $rate = $assignment->client->rate;
            $client = $assignment->client->name;

            $clientsBalances->push(['name'=>$client,'debt'=>($rate*$total)]);
        }

        return $clientsBalances;
    }

    public function getCompanionsBalance() {
    }
}
