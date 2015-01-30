<?php


Route::pattern('id', '[0-9]+');

Route::get(   '/',            ['as' => 'home',         'uses' => 'PostsController@index']);
Route::get('posts/{id}', ['as' => 'posts.show',   'uses' => 'PostsController@show']);
Route::get('posts/create', ['as' => 'posts.create',   'uses' => 'PostsController@create']);
Route::post('posts/store', ['as' => 'posts.store',   'uses' => 'PostsController@store']);
Route::delete('posts/{id}',   ['as' => 'posts.delete', 'uses' => 'PostsController@destroy']);
Route::post('posts/{id}/like',    ['as' => 'posts.like',    'uses' => 'PostsController@like']);
Route::post('posts/{id}/dislike', ['as' => 'posts.dislike', 'uses' => 'PostsController@dislike']);


Route::post('comments/{id}/like',    ['as' => 'comments.like',    'uses' => 'CommentsController@like']);
Route::post('comments/{id}/dislike', ['as' => 'comments.dislike', 'uses' => 'CommentsController@dislike']);


Route::post('comments/store', ['as' => 'comments.store', 'uses' => 'CommentsController@store']);

Route::get('test', function(){
   return Comment::find(1)->counter;
});

