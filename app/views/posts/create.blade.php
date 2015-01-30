@extends('layouts.main')

@section('content')


    <h1>Create new post</h1>

    {{ Form::open( [
        'route' => 'posts.store',
        'method' => 'post',
        'id' => 'form-add-post',
    ] ) }}

    <div class="form-group">
        {{ Form::text( 'title', '', [
            'placeholder' => 'Title',
            'class' => 'form-control',
            'required' => true,
        ] ) }}
    </div>

    <div class="form-group">
        {{ Form::textarea( 'description', '', [
            'placeholder' => 'Enter description',
            'class' => 'form-control',
            'required' => true,
        ] ) }}
    </div>

    {{ Form::submit( 'Add', ['id' => 'btn-add-comment', 'class' => 'btn btn-default'] ) }}

    {{ Form::close() }}

@stop