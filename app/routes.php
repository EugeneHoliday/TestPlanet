<?php


Route::pattern('id', '[0-9]+');

Route::get(   '/',            ['as' => 'home',         'uses' => 'PostsController@index']);
Route::get('posts/{id}/', ['as' => 'posts.show',   'uses' => 'PostsController@show']);
Route::delete('posts/{id}',   ['as' => 'posts.delete', 'uses' => 'PostsController@destroy']);
Route::post('posts/{id}/like',    ['as' => 'posts.like',    'uses' => 'PostsController@like']);
Route::post('posts/{id}/dislike', ['as' => 'posts.dislike', 'uses' => 'PostsController@dislike']);


Route::post('comments/{id}/like',    ['as' => 'comments.like',    'uses' => 'CommentsController@like']);
Route::post('comments/{id}/dislike', ['as' => 'comments.dislike', 'uses' => 'CommentsController@dislike']);


Route::post('comments/create', ['as' => 'comments.create', 'uses' => 'CommentsController@create']);

