<?php

namespace App\Repositories\Client;

use App\Models\Client;
use Illuminate\Support\Collection;

class StoreClientRepository 
{
    public static function createClient(Collection $client)
    {
        return Client::create($client->all());
    }
}