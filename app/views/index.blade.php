@extends('layouts.main')

@section('content')
        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <div class="delete">
                        <a href="{{route('posts.delete', [$post->id])}}" data-method="delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                    </div>
                    <a href="{{route('posts.show', [$post->id])}}"><h2>{{{$post->title}}}</h2></a>
                    <div class="sub">
                        <p>{{$post->comments->count()}} comments</p>
                        <p>created {{$post->created_at}}</p>
                        <div class="vote">
                            <a href="{{route('posts.like', [$post->id, 'plus'])}}"  data-method="post" data-sign="plus" rel="nofollow"><i class="fa fa-plus"></i></a>
                            <span class="rate">{{$post->overallRating}}</span>
                            <a href="{{route('posts.like', [$post->id, 'minus'])}}"  data-method="post" data-sign="minus" rel="nofollow"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                </div>

            @endforeach
            {{$posts->links()}}
        </div>
@endsection

@section('script')
    <script type="text/javascript">
        jQuery( document ).ready( function( $ ) {

            vote({{Like::DEFAULTWEIGHT}});

        } );
    </script>
@stop