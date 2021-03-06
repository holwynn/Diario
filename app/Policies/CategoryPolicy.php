<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Category;

class CategoryPolicy
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
     * Determine whether the user can view the category list.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function list(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function view(User $user, Category $category)
    {
        //
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        //
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        //
    }

    /**
     * Determine whether the user can destroy the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function destroy(User $user, Category $category)
    {
        //
    }
}
