<?php

namespace App\Repositories\Assignment;

use App\Models\Assignment;
use App\Models\AssignmentTemplate;
use App\Repositories\TemplateMigration\StoreTemplateMigrationRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

final class GenerateAssignmentFromTemplateRepository
{
    public function __construct(
        private readonly StoreTemplateMigrationRepository $storeRepository,
    ) {
    }

    public function generate(): Collection
    {
        $templates = AssignmentTemplate::with(['days'])->where('enabled', '=', true)->get();

        $this->generateAssignmentsFromTemplates($templates);

        return $templates;
    }

    private function generateAssignmentsFromTemplates(Collection $templates): void
    {
        $templates->each(
            function ($template) {
                $migration = $this->storeRepository->store($template);
                $migrationDate = Carbon::parse($migration->created_at);

                if ($migrationDate->isToday()) {
                    $this->generateAssignmentsFromTemplate($template);
                }
            }
        );
    }

    private function generateAssignmentsFromTemplate($template): void
    {
        $startDate = Carbon::parse($template->created_at);
        $endDate = Carbon::parse($template->created_at)->endOfMonth();
        $days = $template->days;

        foreach ($days as $day) {
            $date = Carbon::parse($startDate);

            while ($date->lessThanOrEqualTo($endDate)) {
                if ($date->dayOfWeek === $day->value) {
                    $this->createAssignment($template, $day, $date);
                }
                $date->addDay();
            }
        }
    }

    private function createAssignment($template, $day, $date): void
    {
        Assignment::create([
            'assignment_template_id' => $template->id,
            'client_id' => $template->client_id,
            'companion_id' => $template->companion_id,
            'date' => $date,
            'hours' => $day->pivot->hours,
            'from' => $day->pivot->from,
            'to' => $day->pivot->to
        ]);
    }
}
