<?php

namespace App\Repositories\Companion;

use App\Models\Companion;
use Illuminate\Support\Collection;

class StoreCompanionRepository 
{
    public static function store(Collection $companion)
    {
        return Companion::updateOrCreate($companion->all());
    }
}