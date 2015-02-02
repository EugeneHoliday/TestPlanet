<div id="comment_{{$comment->id}}" class="comment  commentable" data-id="{{$comment->id}}">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="sharp" href="#comment_{{$comment->id}}">#</a>
            <span class="date">{{$comment->created_at}}</span>
            <div class="vote">
                <a href="{{route('comments.like', [$comment->id, 'sign' => 'plus'])}}"  data-method="post" data-sign="plus" rel="nofollow"><i class="fa fa-plus"></i></a>
                <span class="rate">{{$comment->rating}}</span>
                <a href="{{route('comments.like', [$comment->id, 'sign' => "minus"])}}"  data-method="post" data-sign="minus" rel="nofollow"><i class="fa fa-minus"></i></a>
            </div>
            <span class="reply"><a href="#comment_{{$comment->id}}"><i class="fa fa-reply"></i></a></span>
        </div>
        <div class="panel-body">
            {{{$comment->content}}}
        </div>
    </div>
</div>
