<?php

namespace App\Repository\Client;

use App\Models\Client;

class GetClientRepository 
{
    public static function getAll()
    {
        return Client::all();
    }
}