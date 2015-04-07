<?php namespace App\Http\Controllers;

use App\BlogPost;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class BlogAdmin extends Controller
{
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('blog.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $input = \Input::all();
        $blogPost = BlogPost::create($input);

        return \Redirect::route('blogadmin')
            ->with('message', 'Post created!');
	}
}
