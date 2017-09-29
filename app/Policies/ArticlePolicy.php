<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Article;

class ArticlePolicy
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
     * Determine whether the user can publish the article.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function publish(User $user, Article $article)
    {
        return in_array($article->category->id, $user->editorOf);
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isWriter() || $user->isEditor();
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        return $user->id === $article->user->id ||
            in_array($article->category->id, $user->editorOf);
    }

    /**
     * Determine whether the user can delete (soft) the article.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        if ($user->isEditor()) {
            return in_array($article->category->id, $user->editorOf);
        }
    }

    /**
     * Determine whether the user can destroy (hard) the article.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function destroy(User $user, Article $article)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the article.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function restore(User $user, Article $article)
    {
        if ($user->isEditor()) {
            return in_array($article->category->id, $user->editorOf);
        }
    }
}
