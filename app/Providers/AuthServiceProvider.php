<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate; 
use App\Models\Gallery;
use App\Policies\GalleryPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Gallery::class => GalleryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is_admin',function ($user)
        {
            return $user->role->name == 'admin';
        });

        Gate::define('is_user',function ($user)
        {
            return $user->role->name == 'user';
        });

    }
}
