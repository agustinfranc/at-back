<?php

declare(strict_types=1);

namespace App\Repositories\Client;

use App\Models\Client;

class ShowClientRepository
{
    public static function show($id)
    {
        return Client::find($id);
    }
}
