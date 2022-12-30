<?php

namespace Tests\Unit\Client;

use App\Models\Client;
use App\Modules\Client\Interfaces\IGetClientRepository;
use Illuminate\Support\Collection;

class HardcodedInMemoryGetClientRepository implements IGetClientRepository
{
    // public function __construct(
    //     $user
    // ) {
    // }

    public static function getAll(): Collection
    {
        return Client::all();
    }

    public static function getOne(int $id): ?Client
    {
        return Client::find($id);
    }
}
