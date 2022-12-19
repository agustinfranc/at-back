<?php

declare(strict_types=1);

namespace App\Repositories\TemplateMigration;

use App\Models\TemplateMigration;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class GetTemplateMigrationRepository
{
  public static function getByMonth($id): Collection
  {
    return TemplateMigration::where('assignment_template_id', $id)->whereMonth('migration_date', Carbon::parse(date("Y-m-d"))->month)->get();
  }
}
