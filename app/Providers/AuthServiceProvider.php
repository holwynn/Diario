<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\User' => 'App\Policies\UserPolicy',
        'App\Article' => 'App\Policies\ArticlePolicy',
        'App\Category' => 'App\Policies\CategoryPolicy',
        'App\Profile' => 'App\Policies\ProfilePolicy',
        'App\Frontblock' => 'App\Policies\FrontblockPolicy',
        'App\Editor' => 'App\Policies\EditorPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-dashboard', function ($user) {
            return $user->isWriter() || $user->isEditor() || $user->isAdmin();
        });
    }
}
