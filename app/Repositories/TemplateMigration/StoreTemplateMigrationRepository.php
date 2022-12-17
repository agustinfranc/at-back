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
        // TODO: retornar no un booleano sino las migraciones que se crearon
        return $this->makeMigrations($template);
    }

    // TODO:
    //* en realidad no necesitaste las migraciones de los meses anteriores, solo la del mes corriente
    //* no te importa si el mes anterior se creo o no, la vas a crear de todas maneras
    private function makeMigrations(AssignmentTemplate $template): bool
    {
        // TODO: obtener de un repositorio de tipo get
        $migrations = TemplateMigration::where('assignment_template_id', $template->id)->get();

        // Si el template no tiene migraciones creo una y retorno
        if ($migrations->isEmpty()) {
            // TODO: llevar el create a un metodo privado
            TemplateMigration::create([
                'assignment_template_id' => $template->id,
                'migration_date' => date("Y-m-d"),
            ]);

            return true;
        }

        // Si tiene las recorro, y si es la migracion del mes corriente entonces no creo una migracion
        // de lo contrario creo una migracion con fecha del dia actual
        foreach ($migrations as $migration) {
            $migrationMonth = Carbon::parse($migration->migrationDate)->month;
            $currentMonth = Carbon::parse(date("Y-m-d"))->month;

            if ($migrationMonth === $currentMonth) return false;

            // TODO: llevar el create a un metodo privado
            TemplateMigration::create([
                'assignment_template_id' => $template->id,
                'migration_date' => date("Y-m-d"),
            ]);

            return true;
        }

        return true;
    }
}
