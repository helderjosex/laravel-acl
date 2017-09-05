<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Gate;

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
    }
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$permissions = $this->permission->all();	
        return view('painel.permissions.index', compact('permissions'));
    }
}
