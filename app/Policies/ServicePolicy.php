<?php

namespace App\Policies;

use App\User;
use App\Service;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
	}

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

    public function update(User $user, Service $service)
    {
        return $user->id === $service->business->user_id;
    }
}
