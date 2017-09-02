<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
		$posts = $post->all();
		//$posts = $post->where('user_id', auth()->user()->id)->get();
        return view('home', compact('posts'));
    }
	
	public function update($id)
    {
		$post = Post::find($id);
		
		//$this->authorize('update-post', $post);
		if (Gate::denies('edit_post', $post)) {
			abort(403, 'Unauthorized');
		}
        return view('post-update', compact('post'));
    }
	
	public function rolesPermissions()
	{
	   $userName = auth()->user()->name;
	   //echo "<h1>{$userName}</h1>";	
	   $roles = auth()->user()->roles;
	   /*foreach($roles as $role)
	   {
		   echo "$role->name -> ";
		   
		   $permissions = $role->permissions;
		   
		   foreach($permissions as $permission)
		   {
			   
			 echo $permission->name.", ";  
		   }
		   
		   echo "<hr>";
	   }*/
	   return view('roles-permissions', compact('userName','roles'));
	}	
}
