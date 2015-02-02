<?php

class PostsController extends \BaseController {


    public function like($id, $sign)
    {
        if (Auth::guest())
            $value = Like::DEFAULTWEIGHT;
        //$sign = Input::get('sign');
        $like = new Like([
            'value' => Like::voteValue($sign, $value)
        ]);

        $post = Post::findOrFail($id);
        $post->likes()->save($like);
        $response = array(
            'status' => 'success',
        );

        return Response::json( $response );
    }

	/**
	 * Display a listing of the resource.
	 * GET /posts
	 *
	 * @return Response
	 */
	public function index()
	{
        $posts = Post::with('comments')->orderBy('created_at', 'desc')->paginate(15);
        return View::make('index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /posts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /posts
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::except('_token');

        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:5000'
        ];

        $validator = Validator::make($input, $rules);

        if($validator->passes()){
            $post = Post::create($input);
            return Redirect::route('posts.show', $post->id);
        }
        return Redirect::back()->withErrors($validator)->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $post = Post::with(['comments'])->find($id);
        return View::make('posts.show', compact('post'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Post::find($id)->delete();
        return Redirect::route('home');
	}

}