<?php

class CommentsController extends \BaseController {

    public function like()
    {

    }

	/**
	 * Show the form for creating a new resource.
	 * GET /comments/create
	 *
	 * @return Response
	 */
    public function create()
    {
        //
    }
	/**
	 * Store a newly created resource in storage.
	 * POST /comments
	 *
	 * @return Response
	 */
	public function store()
	{
        if ( Session::token() !== Input::get( '_token' ) ) {
            return Response::json( array(
                'msg' => 'Unauthorized attempt'
            ) );
        }


        $comment = Comment::create(
            Input::all()
        );


        $response = array(
            'status' => 'success',
            'msg' => 'Comment added successfully',
        );

        return View::make('posts.comment', compact('comment'));

        //return Response::json( $response );
	}


	/**
	 * Remove the specified resource from storage.
	 * DELETE /comments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Comment::find($id)->delete();
        return Redirect::back();
	}

}