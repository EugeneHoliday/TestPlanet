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
    public function create() {

        if ( Session::token() !== Input::get( '_token' ) ) {
            return Response::json( array(
                'msg' => 'Unauthorized attempt'
            ) );
        }

        $content = Input::get( 'content' );
        $parent_id = Input::get( 'parent_id' );
        $parent_type = Input::get( 'parent_type' );

        //.....
        //validate data
        //and then store it in DB
        //.....

        $response = array(
            'status' => 'success',
            'msg' => 'Comment added successfully',
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 * GET /comments/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /comments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
		//
	}

}