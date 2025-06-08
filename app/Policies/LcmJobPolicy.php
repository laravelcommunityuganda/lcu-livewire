<?php

namespace App\Policies;

use App\Models\LcmJob;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class LcmJobPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, LcmJob $job)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, LcmJob $job)
    {
        return $user->id === $job->user_id || $user->isAdmin();
    }

    public function delete(User $user, LcmJob $job)
    {
        return $user->id === $job->user_id || $user->isAdmin();
    }
    
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, LcmJob $lcmJob): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, LcmJob $lcmJob): bool
    {
        return false;
    }
}
