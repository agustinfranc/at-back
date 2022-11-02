<?php

declare(strict_types=1);

namespace App\Repositories\Balance;

class GetBalanceRepository
{
  public static function getClientBalances($clients){
    $clientsBalances = collect();
        $totalHours = 0;
        foreach($clients as $client){
            $clientAssignments =  $client->assignments;
            foreach($clientAssignments as $assignment){
                foreach($assignment->days as $day){
                    $totalHours += $day->pivot->hours;
                }
            }

            $rate = $client->rate;
            if($totalHours != 0){
              $clientsBalances->push(['name'=>$client->name,'debt'=>($rate*$totalHours)]);
            }
        }

        return $clientsBalances;
  }

  public static function getCompanionBalances($companions){
    $companionsBalances = collect();
    foreach($companions as $companion){
      $companionAssigments = $companion->assignments;
      $totalHours = 0;
      $totalCompanion = 0;
      $totalAssignment = 0;
      foreach($companionAssigments as $assignment) {
        $rate = $assignment->client->rate;
        foreach($assignment->days as $day) {
          $totalHours += $day->pivot->hours;
        }
        $totalAssignment = $rate*$totalHours;
      }
      $totalCompanion += $totalAssignment;
      if($totalCompanion != 0){
        $companionsBalances->push(['name'=>$companion->name,'debt'=>$totalCompanion]);
      }
    }

    return $companionsBalances;
  }
}