<?php

namespace App\Repositories\Assignment;

use App\Models\Assignment;
use App\Models\AssignmentTemplate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class GenerateAssignmentFromTemplateRepository
{
  public function generate()
  {
    $templates = AssignmentTemplate::with(['days'])->get()->where('enabled', '=', 1);

    $this->generateAssignmentsFromTemplates($templates);

    return $templates;
  }

  private function generateAssignmentsFromTemplates(Collection $templates)
  {
    foreach ($templates as $template) {
      $days = new Collection($template->days);
      $this->generateAssignmentsFromTemplate($template, $days);
    }
  }

  private function generateAssignmentsFromTemplate($template, $days)
  {
    $startDate = Carbon::parse($template->created_at);
    $endDate = Carbon::parse($template->created_at)->endOfMonth();

    foreach ($days as $day) {
      $date = Carbon::parse($startDate);
      logger("asignacion");

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
    $assignment = new Assignment();
    $input = new Collection();
    $input->put('client_id', $template->client_id);
    $input->put('companion_id', $template->companion_id);
    $input->put('date', $date);
    $input->put('hours', $day->pivot->hours);
    $input->put('from', $day->pivot->from);
    $input->put('to', $day->pivot->to);

    $assignment->fill($input->all());
    $assignment->save();
  }
}
