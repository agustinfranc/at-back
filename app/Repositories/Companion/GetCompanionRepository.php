<?php

declare(strict_types=1);

namespace App\Repositories\Companion;

use App\Models\Companion;
use Illuminate\Database\Eloquent\Collection;

class GetCompanionRepository
{
    public static function getAll(): Collection
    {
        return Companion::all();
    }

    public static function getOne($id): ?Companion
    {
        return Companion::find($id);
    }
}
