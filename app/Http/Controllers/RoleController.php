<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Gate;

class RoleController extends Controller
{
     private $role;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Role $role)
    {
        $this->middleware('auth');
		
		$this->role = $role;
    }
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$roles = $this->role->all();	
        return view('painel.roles.index', compact('roles'));
    }
	
	/**
     * Show the permissions
     *
     * @return \Illuminate\Http\Response
     */
    public function permissions($id)
    {
		$role = $this->role->find($id);	
		$permissions = $role->permissions()->get();
        return view('painel.roles.permissions', compact('role','permissions'));
    }
}
