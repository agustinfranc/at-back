<?php

declare(strict_types=1);

namespace App\Repositories\Companion;

use App\Models\Companion;

class ShowCompanionRepository
{
    public static function show($id)
    {
        return Companion::find($id);
    }
}
