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

    $this->_iterateTemplates($templates);

    return $templates;
  }

  public function _iterateTemplates(Collection $templates)
  {
    $days = new Collection();

    foreach ($templates as $template) {
      $days = $template->days;
      $this->_generateAssignmentsFromTemplate($template, $days);
    }
  }

  public function _generateAssignmentsFromTemplate($template, $days)
  {
    $date = Carbon::parse($template->created_at);
    $endDate = Carbon::parse($template->created_at)->endOfMonth();

    foreach ($days as $day) {
      $startDate = Carbon::parse($date);
      $i = $date->weekNumberInMonth;
      while ($i <= $endDate->weekNumberInMonth) {
        if ($startDate->weekNumberInMonth != 4) {
          $startDate->next($day->value);
          $this->_makeAssignment($template, $day, $startDate);
        }
        $i++;
      }
    }
  }

  public function _makeAssignment($template, $day, $date)
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
