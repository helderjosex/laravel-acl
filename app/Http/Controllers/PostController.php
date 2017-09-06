<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Gate;

class PostController extends Controller
{
	
	private $post;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->middleware('auth');
		
		$this->post = $post;
		
		/*if (Gate::denies('view_post')) 
		{
			return abort(403, 'Unauthorized');
		}*/
    }
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$this->checkPermission('view_post');
		$posts = $this->post->all();	
        return view('painel.posts.index', compact('posts'));
    }
}
