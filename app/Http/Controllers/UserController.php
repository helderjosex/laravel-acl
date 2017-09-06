<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Gate;

class UserController extends Controller
{
    private $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->middleware('auth');
		
		$this->user = $user;
				
    }
		
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$this->checkPermission('user');
		
		$users = $this->user->all();	
        return view('painel.users.index', compact('users'));
    }
	
	/**
     * Show the roles
     *
     * @return \Illuminate\Http\Response
     */
    public function roles($id)
    {
		$this->checkPermission('user');
		
		$user = $this->user->find($id);	
		$roles = $user->roles()->get();
        return view('painel.users.roles', compact('user','roles'));
    }
	
	public function edit()
    {
		if (Gate::denies('edit_user')) 
		{
			abort(403, 'Unauthorized');
		}
		
		// Show Form
    }
	
	public function update()
    {
		if (Gate::denies('edit_user')) 
		{
			abort(403, 'Unauthorized');
		}
		
		// Show Form
    }
}
