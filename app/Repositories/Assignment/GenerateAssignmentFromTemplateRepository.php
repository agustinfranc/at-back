<?php

declare(strict_types=1);

namespace App\Repositories\Assignment;

use App\Models\AssignmentTemplate;
use App\Repositories\TemplateMigration\GetTemplateMigrationRepository;
use App\Repositories\TemplateMigration\StoreTemplateMigrationRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

final class GenerateAssignmentFromTemplateRepository
{
    public function __construct(
        private readonly StoreTemplateMigrationRepository $storeRepository,
        private readonly GetTemplateMigrationRepository $getRepository,
        private readonly StoreAssignmentRepository $storeAssignmentRepository
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
                $this->checkAndCreateMigrations($template);
            }
        );
    }

    private function checkAndCreateMigrations($template): void
    {
        $migration = $this->getRepository::getByMonth($template->id);

        if ($migration->isEmpty()) {
            $this->storeRepository->store($template);
            $this->generateAssignmentsFromTemplate($template);
        }
    }

    private function generateAssignmentsFromTemplate($template): void
    {
        $startDate = Carbon::parse(date("Y-m-d"));
        $endDate = Carbon::parse(date("Y-m-d"))->endOfMonth();
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
        $assignment = collect([
            'assignment_template_id' => $template->id,
            'client_id' => $template->client_id,
            'companion_id' => $template->companion_id,
            'date' => $date,
            'hours' => $day->pivot->hours,
            'from' => $day->pivot->from,
            'to' => $day->pivot->to
        ]);

        $this->storeAssignmentRepository->store($assignment);
    }
}
