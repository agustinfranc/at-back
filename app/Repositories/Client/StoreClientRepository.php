<?php

namespace App\Repositories\Client;

use App\Models\Client;
use Illuminate\Support\Collection;

class StoreClientRepository 
{
    public static function store(Collection $client)
    {
        return Client::updateOrCreate($client->all());
    }

    public function softDelete(Client $client): bool
    {
        return $client->delete();
    }
}