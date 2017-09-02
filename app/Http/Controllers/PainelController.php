<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use App\Post;

class PainelController extends Controller
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
    public function index()
    {
		$totalUsers 	  = User::count();
		$totalRoles 	  = Role::count();
		$totalPermissions = Permission::count();
		$totalPosts 	  = Post::count();
		
		return view('painel.dashboard.index', compact('totalUsers', 'totalRoles', 'totalPermissions', 'totalPosts'));
    }
}
