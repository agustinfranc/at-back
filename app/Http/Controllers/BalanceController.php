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
        $clientsBalances = collect();
        $clients = $this->getClientRepository::getAll();
        $total = 0;

        foreach($clients as $client){
            $clientAssignments =  $client->assignments;
            foreach($clientAssignments as $assignment){
                foreach($assignment->days as $day){
                    $total += $day->pivot->hours;
                }
            }

            $rate = $client->rate;
            $clientsBalances->push(['name'=>$client->name,'debt'=>($rate*$total)]);
        }

        return $clientsBalances;
    }

    public function getCompanionsBalance() {
    }
}
