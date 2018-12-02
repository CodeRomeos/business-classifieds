<?php

namespace App\Policies;

use App\User;
use App\Business;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusinessPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->is_super_admin) {
            return true;
        }
    }

    public function create(User $user)
    {
        return !! $user->isAdvertiser;
    }

    public function update(User $user, Business $business)
    {
        return $user->id === $business->user_id;
    }
}
