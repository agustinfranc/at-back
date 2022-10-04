<?php

declare(strict_types=1);

namespace App\Repositories\Assignment;

use App\Exceptions\AlreadyExistPeriodicAssignment;
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
            throw new AlreadyExistPeriodicAssignment();
            // $assignment = $this->readRepository->existPeriodicAssignment($input['client_id'], $input['companion_id']);
        }

        $assignment->fill($input->all());

        $assignment->saveOrFail();

        $this->_storeDays($input, $assignment);

        return $assignment;
    }

    private function _storeDays(Collection $input, Assignment $assignment)
    {
        if (empty($input['days'])) {
            return $assignment;
        }

        $assignmentDays = [];

        foreach ($input['days'] as $day) {
            if (true === $day['enabled']) {
                // $assignmentDays[$day['id']] = ['hours' => $day['hours']];
                $assignmentDays[$day['id']] = collect($day)->only(['hours', 'from', 'to'])->toArray();
            }
        }

        $assignment->days()->sync($assignmentDays);
    }
}
