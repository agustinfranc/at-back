<?php

declare(strict_types=1);

namespace App\Repositories\Assignment;

use App\Models\Assignment;
use Illuminate\Support\Collection;

final class StoreAssignmentRepository
{
    public function __construct(private readonly GetAssignmentRepository $readRepository)
    {
    }

    public function storeWithDays(Collection $input, Assignment $assignment): Assignment
    {
        if ($this->readRepository
            ->existPeriodicAssignment($input['client_id'], $input['companion_id'])
        ) {
            abort(
                422,
                'Ya existe una asignacion periodica para el cliente y acompañante seleccionados.'
            );
        }

        $assignment->fill($input->all());

        $assignment->saveOrFail();

        $this->storeDays($input, $assignment);

        return $assignment;
    }

    private function storeDays(Collection $input, Assignment $assignment)
    {
        if (empty($input['days'])) {
            return $assignment;
        }

        // TODO: terminar:
        // le paso un array asi con todos
        // el primer numero es el id de la tabla days, lo demas son otros datos
        $assignment->days()->sync([1 => ['hours' => 23], 2 => ['hours' => 22]]);
    }
}
