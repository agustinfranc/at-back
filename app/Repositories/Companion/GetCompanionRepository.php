<?php

declare(strict_types=1);

namespace App\Repositories\Companion;

use App\Models\Companion;

class GetCompanionRepository 
{
    public static function getAll()
    {
        return Companion::all();
    }
}