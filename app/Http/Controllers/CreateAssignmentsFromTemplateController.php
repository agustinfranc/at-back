<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentTemplate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class CreateAssignmentsFromTemplateController extends Controller
{
  public function generate()
  {
    $templates = AssignmentTemplate::with(['days'])->get()->where('enabled', '=', 1);

    $this->generateAssignmentsFromTemplates($templates);

    return $templates;
  }

  private function generateAssignmentsFromTemplates(Collection $templates)
  {
    $days = new Collection();

    foreach ($templates as $template) {
      $days = $template->days;
      $this->generateAssignmentsFromTemplate($template, $days);
    }
  }

  private function generateAssignmentsFromTemplate($template, $days)
  {
    $date = Carbon::parse($template->created_at);
    $endDate = Carbon::parse($template->created_at)->endOfMonth();

    foreach ($days as $day) {
      $startDate = Carbon::parse($date);
      while ($startDate->lessThanOrEqualTo($endDate)) {
        if ($startDate->dayOfWeek == $day->value) {
          $this->makeAssignment($template, $day, $startDate);
        }
        $startDate->addDay();
      }
    }
  }

  private function makeAssignment($template, $day, $date): void
  {
    $assignment = new Assignment();
    $assignment->client_id =  $template->client_id;
    $assignment->companion_id =  $template->companion_id;
    $assignment->date = $date;
    $assignment->hours =  $day->pivot->hours;
    $assignment->from =  $day->pivot->from;
    $assignment->to =  $day->pivot->to;
    $assignment->save();
  }
}
