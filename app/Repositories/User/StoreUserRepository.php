<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Models\User;

class StoreUserRepository
{
    public static function store(User $user): User
    {
        return User::updateOrCreate(['id' => $user->pull('id')], $user->all());
    }

    public function softDelete(User $user): bool
    {
        return $user->delete();
    }
}
