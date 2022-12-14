<?php

declare(strict_types=1);

namespace App\Repositories\Client;

use App\Models\Client;
use App\Modules\Client\Interfaces\IGetClientRepository;
use Illuminate\Support\Collection;

class GetClientRepository implements IGetClientRepository
{
    public static function getAll(): Collection
    {
        return Client::all();
    }

    public static function getOne(int $id): ?Client
    {
        return Client::find($id);
    }
}
