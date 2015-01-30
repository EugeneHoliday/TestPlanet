@extends('layouts.main')

@section('content')
        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <div class="delete">
                        <a href="{{route('posts.delete', [$post->id])}}" data-method="delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                    </div>
                    <a href="{{route('posts.show', [$post->id])}}"><h2>{{{$post->title}}}</h2></a>
                    <p>{{{$post->description}}}</p>
                    <div class="sub">
                        <p>{{$post->comments->count()}} comments</p>
                        <div class="vote">
                            <a href="{{route('posts.like', [$post->id])}}"  data-method="post" rel="nofollow"><i class="fa fa-plus"></i></a>
                            <span class="badge rate">{{$post->rating}}</span>
                            <a href="{{route('posts.dislike', [$post->id])}}"  data-method="post" rel="nofollow"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                </div>

            @endforeach
            {{$posts->links()}}
        </div>
@endsection