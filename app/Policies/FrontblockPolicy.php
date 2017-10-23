<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Frontblock;

class FrontblockPolicy
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
     * Determine whether the user can vie the list of frontblocks.
     *
     * @param  \App\User  $user
     * @param  \App\Frontblock  $frontblock
     * @return mixed
     */
    public function list(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the frontblock.
     *
     * @param  \App\User  $user
     * @param  \App\Frontblock  $frontblock
     * @return mixed
     */
    public function view(User $user, Frontblock $frontblock)
    {
        //
    }

    /**
     * Determine whether the user can create frontblocks.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the frontblock.
     *
     * @param  \App\User  $user
     * @param  \App\Frontblock  $frontblock
     * @return mixed
     */
    public function update(User $user, Frontblock $frontblock)
    {
        //
    }

    /**
     * Determine whether the user can delete the frontblock.
     *
     * @param  \App\User  $user
     * @param  \App\Frontblock  $frontblock
     * @return mixed
     */
    public function delete(User $user, Frontblock $frontblock)
    {
        //
    }
}
