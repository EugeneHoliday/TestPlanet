@foreach($comments as $comment)
    @if(count($comment->replies))
            @include('posts.comment')
        <div class="replies">
            {{View::make('posts.comments', ['comments' => $comment->replies])->render()}}
        </div>
    @else
            @include('posts.comment')
    @endif
@endforeach