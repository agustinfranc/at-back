<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentTemplate;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Expr\Cast\Object_;

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
    foreach ($days as $day) {
      $assignment = new Assignment();
      $assignment->client_id =  $template->client_id;
      $assignment->companion_id =  $template->companion_id;
      //$assignment->date = como hacemos
      $assignment->hours =  $day->pivot->hours;
      $assignment->from =  $day->pivot->from;
      $assignment->to =  $day->pivot->to;

      $assignment->save();
    }
  }
}
