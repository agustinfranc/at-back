<?php

declare(strict_types=1);

namespace App\Repositories\Companion;

use App\Models\Companion;
use Illuminate\Support\Collection;

class StoreCompanionRepository
{
    public static function store(Collection $companion)
    {
        return Companion::updateOrCreate(['id' => $companion->pull('id')],$companion->all());
    }

    public function softDelete(Companion $companion): bool
    {
        return $companion->delete();
    }
}
