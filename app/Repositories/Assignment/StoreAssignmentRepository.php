<?php

declare(strict_types=1);

namespace App\Repositories\Assignment;

use App\Exceptions\AlreadyExistAssignment;
use App\Exceptions\AlreadyExistPeriodicAssignment;
use App\Models\Assignment;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

final class StoreAssignmentRepository
{
    public function __construct(private readonly GetAssignmentRepository $readRepository)
    {
    }

    public function storeWithDays(Collection $input, Assignment $assignment): Assignment
    {
        if (
            $this->readRepository
            ->existPeriodicAssignment($input['client_id'], $input['companion_id'])
        ) {
            throw new AlreadyExistAssignment();
        }

        DB::beginTransaction();

        try {
            $assignment->fill($input->all());

            $assignment->save();

            $this->_storeDays($input, $assignment);

            DB::commit();

            return $assignment;
        } catch (\Exception | \Throwable $e) {
            DB::rollBack();

            abort(500, $e->getMessage());
        }
    }

    public function softDelete(Assignment $assignment): bool
    {
        return $assignment->delete();
    }

    private function _storeDays(Collection $input, Assignment $assignment)
    {
        if (empty($input['days'])) {
            return $assignment;
        }

        $assignmentDays = [];

        foreach ($input['days'] as $day) {
            if (true === $day['enabled']) {
                $assignmentDays[$day['id']] = collect($day)->only(['hours', 'from', 'to'])->toArray();
            }
        }

        $assignment->days()->sync($assignmentDays);
    }
}
