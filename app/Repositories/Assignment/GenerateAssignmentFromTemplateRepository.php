<?php

namespace App\Repositories\Assignment;

use App\Models\Assignment;
use App\Models\AssignmentTemplate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

final class GenerateAssignmentFromTemplateRepository
{
  public function generate(): Collection
  {
    $templates = AssignmentTemplate::with(['days'])->where('enabled', '=', true)->get();

    $this->generateAssignmentsFromTemplates($templates);

    return $templates;
  }

  private function generateAssignmentsFromTemplates(Collection $templates): void
  {
    foreach ($templates as $template) {
      $this->generateAssignmentsFromTemplate($template);
    }
  }

  private function generateAssignmentsFromTemplate($template): void
  {
    $startDate = Carbon::parse($template->created_at);
    $endDate = Carbon::parse($template->created_at)->endOfMonth();
    $days = collect($template->days);
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
      'client_id' => $template->client_id,
      'companion_id' => $template->companion_id,
      'date' => $date,
      'hours' => $day->pivot->hours,
      'from' => $day->pivot->from,
      'to' => $day->pivot->to
    ]);
  }
}
