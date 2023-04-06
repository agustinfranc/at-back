<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class GetUserRepository
{
    public static function getAll(): Collection
    {
        return User::with(['role'])->get();
    }

    public static function getOne(int $id): User
    {
        return User::with(['role'])->find($id);
    }

    public static function getByEmail(string $email): User
    {
        return User::where('email', $email)->get()->first();
    }
}
