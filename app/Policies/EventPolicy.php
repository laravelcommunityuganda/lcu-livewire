<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EventPolicy
{
     use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Event $event)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->isOrganizer();
    }

    public function update(User $user, Event $event)
    {
        return $user->id === $event->user_id || $user->isAdmin();
    }

    public function delete(User $user, Event $event)
    {
        return $user->id === $event->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Event $event): bool
    {
        return $user->id === $event->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Event $event): bool
    {
        return $user->id === $event->user_id || $user->isAdmin();
    }
}
