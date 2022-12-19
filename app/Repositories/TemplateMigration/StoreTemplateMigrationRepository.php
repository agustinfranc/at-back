<?php

declare(strict_types=1);

namespace App\Repositories\TemplateMigration;

use App\Models\AssignmentTemplate;
use App\Models\TemplateMigration;
use Carbon\Carbon;

class StoreTemplateMigrationRepository
{
    public function __construct(
        private readonly GetTemplateMigrationRepository $getRepository,
    ) {
    }
    public function store(AssignmentTemplate $template): bool
    {
        // TODO: retornar no un booleano sino las migraciones que se crearon
        return $this->makeMigrations($template);
    }

    private function makeMigrations(AssignmentTemplate $template): bool
    {
        $migrations = $this->getRepository::getByMonth($template->id);
        if ($migrations->isEmpty()) {
            return $this->createMigration($template);
        }

        // Si tiene las recorro, y si es la migracion del mes corriente entonces no creo una migracion
        // de lo contrario creo una migracion con fecha del dia actual
        foreach ($migrations as $migration) {
            $migrationMonth = Carbon::parse($migration->migrationDate)->month;
            $currentMonth = Carbon::parse(date("Y-m-d"))->month;

            if ($migrationMonth === $currentMonth) return false;

            $this->createMigration($template);

            return true;
        }

        return true;
    }

    private function createMigration($template): TemplateMigration
    {
        return TemplateMigration::create([
            'assignment_template_id' => $template->id,
            'migration_date' => date("Y-m-d"),
        ]);
    }
}
