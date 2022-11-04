<?php

namespace App\Exceptions;

use Exception;

class AlreadyExistPeriodicAssignment extends Exception
{
    public function report()
    {
        abort(
            422,
            'Ya existe una asignacion para el cliente y acompañante seleccionados.'
        );
    }
}
