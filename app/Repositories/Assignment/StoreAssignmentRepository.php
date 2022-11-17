<?php

declare(strict_types=1);

namespace App\Repositories\Assignment;

use App\Models\Assignment;
use Illuminate\Support\Collection;


class StoreAssignmentRepository
{
    public static function store(Collection $assignment)
    {
        return Assignment::updateOrCreate(['id' => $assignment->get('id')], $assignment->all());
    }

    public static function softDelete(Assignment $assignment): bool
    {
        return $assignment->delete();
    }
}
