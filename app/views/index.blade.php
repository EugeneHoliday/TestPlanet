@extends('layouts.main')

@section('content')
        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <a href="{{route('posts.show', [$post->id])}}"><h2>{{{$post->title}}}</h2></a>
                    <p>{{{$post->description}}}</p>
                    <div class="sub">
                        <p>{{$post->comments->count()}} comments</p>
                        @include('partials._voting')
                        <a href="{{route('posts.delete', [$post->id])}}" data-method="delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                    </div>

                </div>

            @endforeach
            {{$posts->links()}}
        </div>
@endsection