<?php

declare(strict_types=1);

namespace App\Modules\Client\Interfaces;

use App\Models\Client;
use Illuminate\Support\Collection;

interface IGetClientRepository
{
    public static function getAll(): Collection;

    public static function getOne(int $id): ?Client;
}
