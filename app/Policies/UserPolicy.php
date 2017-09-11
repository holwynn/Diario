<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        } else {
            return null;
        }
    }

    /**
     * Determine whether the user can view the user list.
     *
     * @param  \App\User  $authenticatedUser
     * @return mixed
     */
    public function list(User $authenticatedUser)
    {
        
    }

    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\User  $authenticatedUser
     * @return mixed
     */
    public function view(User $authenticatedUser, User $user)
    {
        return $authenticatedUser->id === $user->id;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\User  $authenticatedUser
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $authenticatedUser, User $user)
    {
        return $authenticatedUser->id === $user->id;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\User  $authenticatedUser
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $authenticatedUser, User $user)
    {
        return false;
    }
}
