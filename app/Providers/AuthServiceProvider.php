<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 管理者のみ
        Gate::define('admin-only', function($user){
            return ($user->role == 1);
        });

        // 許可されたものと管理者のみ
        Gate::define('authorized-higher', function($user){
            return ($user->role <= 2);
        });

// 全ユーザー
        Gate::define('user-higher', function($user){
            return ($user->role <= 3);
        });
        //
    }
}
