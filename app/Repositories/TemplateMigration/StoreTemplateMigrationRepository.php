<?php

declare(strict_types=1);

namespace App\Repositories\TemplateMigration;

use App\Models\AssignmentTemplate;
use App\Models\TemplateMigration;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class StoreTemplateMigrationRepository
{
  public function store(AssignmentTemplate $template): bool
  {
    return $this->checkForMigrations($template);
  }

  private function checkForMigrations(AssignmentTemplate $template): bool
  {
    $migrations = TemplateMigration::where('assignment_template_id', $template->id)->get();
    logger($migrations);
    foreach ($migrations as $migration) {
      $migrationDate = Carbon::parse($migration->migrationDate);
      $date = Carbon::parse(date("Y-m-d"));
      if ($migrationDate->month == $date->month) {
        return false;
      } else {
        TemplateMigration::create([
          'assignment_template_id' => $template->id,
          'migration_date' => date("Y-m-d"),
        ]);
        return true;
      }
    }
    if ($migrations->isEmpty()) {
      TemplateMigration::create([
        'assignment_template_id' => $template->id,
        'migration_date' => date("Y-m-d"),
      ]);
    }
    return true;
  }
}
