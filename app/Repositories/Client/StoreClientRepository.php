<?php

namespace App\Repositories\Client;

use App\Models\Client;

class StoreClientRepository 
{
    public static function createClient(array $client)
    {
      return Client::create($client);
    }
}