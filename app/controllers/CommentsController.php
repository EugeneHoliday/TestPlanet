<?php

class CommentsController extends \BaseController {

    public function like($id, $sign)
    {
        if (Auth::guest())
            $value = Like::DEFAULTWEIGHT;
        $like = new Like([
            'value' => Like::voteValue($sign, $value)
        ]);

        $comment = Comment::findOrFail($id);
        $comment->likes()->save($like);
        $response = array(
            'status' => 'success',
        );

        return Response::json( $response );
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

        $input = Input::all();

        $rules = [
            'content' => 'required|max:5000'
        ];

        $validator = Validator::make($input, $rules);

        if($validator->passes()){
            $comment = Comment::create($input);
            return View::make('posts.comment', compact('comment'));
        }

        $response = [
            'status' => 'failed'
        ];

        return Response::json( $response );
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