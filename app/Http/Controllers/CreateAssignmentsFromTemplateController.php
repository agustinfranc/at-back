<?php

namespace App\Http\Controllers;

use App\Repositories\Assignment\GenerateAssignmentFromTemplateRepository;

class CreateAssignmentsFromTemplateController extends Controller
{
  public function __construct(
    private readonly GenerateAssignmentFromTemplateRepository $generateRepository
  ) {
  }

  public function generate()
  {
    return $this->generateRepository->generate();
  }
}
