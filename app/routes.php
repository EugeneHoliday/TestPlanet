<?php


Event::listen('like.save', function($like)
{
    $parent = $like->likeable;
    $parent->rating += $like->value;
    $parent->save();
});

Route::pattern('id', '[0-9]+');
Route::pattern('sign', '(plus|minus)');

Route::get(   '/',                      ['as' => 'home',                'uses' => 'PostsController@index']);
    Route::get('posts/{id}',            ['as' => 'posts.show',          'uses' => 'PostsController@show']);
Route::get('posts/create',              ['as' => 'posts.create',        'uses' => 'PostsController@create']);
Route::post('posts/store',              ['as' => 'posts.store',         'uses' => 'PostsController@store']);
Route::delete('posts/{id}',             ['as' => 'posts.delete',        'uses' => 'PostsController@destroy']);

Route::post('posts/{id}/{sign}',        ['as' => 'posts.like',          'uses' => 'PostsController@like']);

Route::post('comments/{id}/{sign}',     ['as' => 'comments.like',       'uses' => 'CommentsController@like']);

Route::post('comments/store',           ['as' => 'comments.store',      'uses' => 'CommentsController@store']);

Route::get('test', function(){
   return 'test';
});

App::missing(function($exception)
{
    return Redirect::home();
});

