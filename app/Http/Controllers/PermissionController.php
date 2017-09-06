<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
//use Gate;

class PermissionController extends Controller
{
    private $permission;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Permission $permission)
    {
        $this->middleware('auth');
		
		$this->permission = $permission;
		
		/*if (Gate::denies('adm')) {
            return abort(403,'não autorizado');
        }*/
    }
		
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {		
		$this->checkPermission('adm');
		$permissions = $this->permission->all();	
        return view('painel.permissions.index', compact('permissions'));
    }
	
	/**
     * Show the roles
     *
     * @return \Illuminate\Http\Response
     */
    public function roles($id)
    {
		$this->checkPermission('adm');
		
		$permission = $this->permission->find($id);	
		$roles = $permission->roles()->get();
        return view('painel.permissions.roles', compact('permission','roles'));
    }
}
