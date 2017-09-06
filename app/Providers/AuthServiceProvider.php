<?php

namespace App\Providers;

use App\Post;
use App\Permission;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as Gates;

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
    public function boot(Gates $gates)
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
			$gates->define($permission->name, function (User $user) use ($permission) {
                return $user->hasPermission($permission);
            });
		}	
		
		$gates->before(function (User $user, $ability) {
            if($user->hasAnyRoles('adm')){
                return true;
            };
        });
		
    }
}
