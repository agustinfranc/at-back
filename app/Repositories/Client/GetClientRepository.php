<?php

declare(strict_types=1);

namespace App\Repositories\Client;

use App\Models\Client;

class GetClientRepository
{
    public static function getAll()
    {
        return Client::all();
    }
}
