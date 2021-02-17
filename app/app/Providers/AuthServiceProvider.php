<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Permissions;
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
        foreach($this->getPermissions() as $permissions)
        {
            Gate::define($permissions->name,function($user) use ($permissions) {
                return $user->hasPermissions($permissions);
            });
        }


        //
    }
    protected function getPermissions()
    {
        return Permissions::get();
    }
}
