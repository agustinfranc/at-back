<?php

declare(strict_types=1);

namespace App\Repositories\AssignmentTemplate;

use App\Exceptions\AlreadyExistAssignment;
use App\Models\AssignmentTemplate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

final class StoreAssignmentTemplateRepository
{
    public function __construct(private readonly GetAssignmentTemplateRepository $readRepository)
    {
    }

    public function storeWithDays(Collection $input, AssignmentTemplate $assignmentTemplate): AssignmentTemplate
    {
        if ($this->readRepository->existAssignment($input['client_id'], $input['companion_id'])
            && ($input->get('id') == null)
        ) {
            throw new AlreadyExistAssignment();
        }

        DB::beginTransaction();

        try {
            $assignmentTemplate->fill($input->all());

            $assignmentTemplate->save();

            $this->storeDays($input, $assignmentTemplate);

            DB::commit();

            return $assignmentTemplate;
        } catch (\Exception | \Throwable $e) {
            DB::rollBack();

            abort(500, $e->getMessage());
        }
    }

    public function softDelete(AssignmentTemplate $assignmentTemplate): bool
    {
        return $assignmentTemplate->delete();
    }

    private function storeDays(Collection $input, AssignmentTemplate $assignmentTemplate): void
    {
        if (empty($input['days'])) {
            return $assignmentTemplate;
        }

        $assignmentTemplateDays = [];

        foreach ($input['days'] as $day) {
            if (true === $day['enabled']) {
                $assignmentTemplateDays[$day['id']] = collect($day)->only(['hours', 'from', 'to'])->toArray();
            }
        }

        $assignmentTemplate->days()->sync($assignmentTemplateDays);
    }
}
