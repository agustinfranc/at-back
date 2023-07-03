<?php

namespace App\Repositories\Client;

use App\Models\Client;
use Illuminate\Support\Collection;

class StoreClientRepository
{
    public static function save(Collection $input, Client $client): Client
    {
        $client->fill($input->all());

        $client->save();

        return $client;
    }

    public static function softDelete(Client $client): bool
    {
        return $client->delete();
    }
}
