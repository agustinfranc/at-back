<?php

declare(strict_types=1);

namespace App\Repositories\Balance;

use App\Models\Assignment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

final class GetBalanceRepository
{
  public static function getClientBalances($clients): Collection
  {
    $clientsBalances = new Collection();
    $current = Carbon::parse(date("Y-m-d"));
    $totalClientHours = 0;
    foreach ($clients as $client) {
      $totalClientHours = self::calculateHours(self::getClientAssignments($client, $current));
      $rate = $client->rate;
      if ($totalClientHours != 0) {
        $clientsBalances->push(['name' => $client->name, 'debt' => ($rate * $totalClientHours)]);
      }
    }
    return $clientsBalances;
  }

  private static function getClientAssignments($client, $current)
  {
    return Assignment::where('client_id', '=', $client->id)->whereMonth('date', $current)->whereYear('date', $current->year)->get();
  }

  private static function calculateHours($assignments): int
  {
    if ($assignments->isEmpty()) return 0;

    return $assignments->reduce(function ($totalHours, $assignment) {
      return $totalHours + $assignment->hours;
    });
  }

  public static function getCompanionBalances($companions): Collection
  {
    $current = Carbon::parse(date("Y-m-d"));
    $companionsBalances = new Collection();
    foreach ($companions as $companion) {
      $companionAssigments = self::getCompanionAssignments($companion, $current);
      $assignmentTotal = self::calculateAssignmentsTotal($companionAssigments);
      if ($assignmentTotal != 0) {
        $companionsBalances->push(['name' => $companion->name, 'debt' => $assignmentTotal]);
      }
    }
    return $companionsBalances;
  }

  private static function getCompanionAssignments($companion, $current)
  {
    return Assignment::with(['client'])->where('companion_id', '=', $companion->id)->whereMonth('date', $current->month)->whereYear('date', $current->year)->get();
  }

  private static function calculateAssignmentsTotal($assignments): float
  {
    if ($assignments->isEmpty()) return 0;

    return $assignments->reduce(function ($assignmentTotal, $assignment) {
      return $assignmentTotal + $assignment->client->rate * $assignment->hours;
    });
  }
}
