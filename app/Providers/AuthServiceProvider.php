<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->registerPostPolicies();
        //
    }

    public function registerPostPolicies()
    {
        Gate::define('create-post', function($user){
            return $user->hasAccess(['create-post']);
        });
        Gate::define('update-post', function($user, $post){
            return $user->hasAccess(['update-post']) ;
        });
        Gate::define('publish-post', function($user){
            return $user->hasAccess(['publish-post']);
        });
        Gate::define('delete-post', function($user, $post){
            return $user->hasAccess(['delete-post']);
        });
        Gate::define('see-all-drafts', function($user){
            return $user->inRole('editor');
        });
    }
}
