<?php

namespace App\Providers;

use App\Post;
use App\Permission;
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
       /*
	   \App\Post::class => \App\Policies\PostPolicy::class,
	   */
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*
		Gate::define('update-post', function ($user, Post $post) {
			return $user->id == $post->user_id;
		});
		*/
		
		$permissions = Permission::with('roles')->get();
		foreach($permissions as $permission)
		{		
			Gate::define($permission->name, function ($user) use ($permission){
				return $user->hasPermission($permission);
			});
		}	
		
		Gate::before(function ($user, $ability){
			
			if ($user->hasAnyRoles('Administrador'))
				return true;
		});
		
    }
}
