<?php

declare(strict_types=1);

namespace App\Repositories\TemplateMigration;

use App\Models\AssignmentTemplate;
use App\Models\TemplateMigration;
// use Carbon\Carbon;
// use Illuminate\Database\Eloquent\Collection;

class StoreTemplateMigrationRepository
{
    // public function __construct(
    //     private readonly GetTemplateMigrationRepository $getRepository,
    // ) {
    // }

    public function store(AssignmentTemplate $template): TemplateMigration
    {
        // return $this->makeMigration($template);

        return TemplateMigration::create([
            'assignment_template_id' => $template->id,
            'migration_date' => date("Y-m-d"),
        ]);
    }

    // private function makeMigration(AssignmentTemplate $template): TemplateMigration
    // {
    //     $migration = $this->getRepository::getByMonth($template->id);

    //     if ($migration->isEmpty()) {
    //         return $this->createMigration($template);
    //     }

    //     return $migration->first();
    // }

    // private function createMigration($template): TemplateMigration
    // {
    //     return TemplateMigration::create([
    //         'assignment_template_id' => $template->id,
    //         'migration_date' => date("Y-m-d"),
    //     ]);
    // }
}
