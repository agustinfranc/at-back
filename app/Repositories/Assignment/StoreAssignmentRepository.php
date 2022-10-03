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

        self::storeDays($input);

        $assignment->saveOrFail();

        return $assignment;
    }

    private static function storeDays(Collection $input, Assignment $assignment)
    {
        if (empty($input['product_prices'])) {
            return $assignment;
        }

        // logger($input);
        collect($input['days'])->each(function ($day) use ($assignment) {
            // logger($day);
            // $assignment->days()
        });
    }
}
