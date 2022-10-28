<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class GetUserRepository
{
    public static function getAll(): Collection
    {
        return User::all();
    }

    public static function getOne(int $id): User
    {
        return User::find($id);
    }
}
