<?php

declare(strict_types=1);

namespace App\Repositories\TemplateMigration;

use App\Models\AssignmentTemplate;
use App\Models\TemplateMigration;

class StoreTemplateMigrationRepository
{
    public function store(AssignmentTemplate $template): TemplateMigration
    {
        return TemplateMigration::create([
            'assignment_template_id' => $template->id,
            'migration_date' => date("Y-m-d"),
        ]);
    }
}
