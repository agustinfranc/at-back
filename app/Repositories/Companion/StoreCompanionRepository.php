<?php

declare(strict_types=1);

namespace App\Repositories\Companion;

use App\Models\Companion;
use Illuminate\Support\Collection;

class StoreCompanionRepository
{
    public static function store(Collection $input, Companion $companion): Companion
    {
        $companion->fill($input->all());

        $companion->save();

        return $companion;
    }

    public static function softDelete(Companion $companion): bool
    {
        return $companion->delete();
    }
}
