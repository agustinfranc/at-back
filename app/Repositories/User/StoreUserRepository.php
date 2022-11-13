<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;

class StoreUserRepository
{
    public static function store(Collection $input, User $user): User
    {
        $input = self::_forgetPasswordWhenIsEmptytUpdate($input);

        $user->fill($input->all());

        $user->save();

        return $user;
    }

    public static function softDelete(User $user): bool
    {
        return $user->delete();
    }

    private static function _forgetPasswordWhenIsEmptytUpdate($input): Collection
    {
        if (!$input->get('password')) {
            $input->forget('password');
        }

        return $input;
    }
}
