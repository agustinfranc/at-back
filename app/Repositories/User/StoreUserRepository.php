<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class StoreUserRepository
{
    public static function save(Collection $input, User $user): User
    {
        $input = self::forgetPasswordWhenIsEmptytUpdate($input);

        $user->fill($input->all());

        $user->password = Hash::make($input->get('password'));

        $user->save();

        return $user;
    }

    public static function softDelete(User $user): bool
    {
        return $user->delete();
    }

    private static function forgetPasswordWhenIsEmptytUpdate($input): Collection
    {
        if (!$input->get('password')) {
            $input->forget('password');
        }

        return $input;
    }
}
