<?php

declare(strict_types=1);

namespace App\Repositories\Assignment;

use App\Models\Assignment;
use Illuminate\Support\Collection;

final class StoreAssignmentRepository
{
    public static function storeWithDays(Collection $input, Assignment $assignment): Assignment
    {
        $assignment->fill($input->all());

        $assignment->saveOrFail();

        self::storeDays($input, $assignment);

        return $assignment;
    }

    private static function storeDays(Collection $input, Assignment $assignment)
    {
        if (empty($input['days'])) {
            return $assignment;
        }

        // le paso un array asi con todos
        // el primer numero es el id de la tabla days, lo demas son otros datos
        $assignment->days()->sync([1 => ['hours' => 23], 2 => ['hours' => 22]]);
    }
}
