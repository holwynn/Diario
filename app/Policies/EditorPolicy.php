<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Editor;

class EditorPolicy
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
     * Determine whether the user can view the editor.
     *
     * @param  \App\User  $user
     * @param  \App\Editor  $editor
     * @return mixed
     */
    public function view(User $user, Editor $editor)
    {
        //
    }

    /**
     * Determine whether the user can create editors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        
    }

    /**
     * Determine whether the user can update the editor.
     *
     * @param  \App\User  $user
     * @param  \App\Editor  $editor
     * @return mixed
     */
    public function update(User $user, Editor $editor)
    {
        //
    }

    /**
     * Determine whether the user can delete the editor.
     *
     * @param  \App\User  $user
     * @param  \App\Editor  $editor
     * @return mixed
     */
    public function delete(User $user, Editor $editor)
    {
        //
    }
}
