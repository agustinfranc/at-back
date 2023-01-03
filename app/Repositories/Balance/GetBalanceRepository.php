<?php

declare(strict_types=1);

namespace App\Repositories\Balance;

use App\Models\Assignment;
use Illuminate\Database\Eloquent\Collection;

final class GetBalanceRepository
{
  public static function getClientBalances($clients): Collection
  {
    $clientsBalances = new Collection();
    $totalClientHours = 0;
    foreach ($clients as $client) {
      $totalClientHours = self::calculateHours(Assignment::where('client_id', '=', $client->id)->get());
      $rate = $client->rate;
      if ($totalClientHours != 0) {
        $clientsBalances->push(['name' => $client->name, 'debt' => ($rate * $totalClientHours)]);
      }
    }
    return $clientsBalances;
  }

  private static function calculateHours($assignments): int
  {
    $totalHours = 0;
    foreach ($assignments as $assignment) {
      $totalHours += $assignment->hours;
    };
    return $totalHours;
  }

  public static function getCompanionBalances($companions): Collection
  {

    $companionsBalances = new Collection();
    foreach ($companions as $companion) {
      $companionAssigments = Assignment::with(['client'])->where('companion_id', '=', $companion->id)->get();
      $assignmentTotal = self::calculateAssignmentsTotal($companionAssigments);
      if ($assignmentTotal != 0) {
        $companionsBalances->push(['name' => $companion->name, 'debt' => $assignmentTotal]);
      }
    }
    return $companionsBalances;
  }

  private static function calculateAssignmentsTotal($assignments): float
  {
    $assignmentTotal = 0;
    foreach ($assignments as $assignment) {
      $assignmentTotal += $assignment->client->rate * $assignment->hours;
    }
    return $assignmentTotal;
  }
}
