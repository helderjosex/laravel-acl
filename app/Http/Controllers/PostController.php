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
    }
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$posts = $this->post->all();	
        return view('painel.posts.index', compact('posts'));
    }
}
