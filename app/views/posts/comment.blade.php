<div id="comment_{{$comment->id}}" class="comment panel panel-default commentable">
  <div class="panel-heading">
    <a href="#comment_{{$comment->id}}">#</a>
    <span class="date">{{$comment->created_at}}</span>
    <div class="vote">
        <a href="{{route('comments.like', [$comment->id])}}"  data-method="post" rel="nofollow"><i class="fa fa-plus"></i></a>
        <a href="{{route('comments.dislike', [$comment->id])}}"  data-method="post" rel="nofollow"><i class="fa fa-minus"></i></a>
    </div>
    <span class="reply"><a href="#comment_{{$comment->id}}"><i class="fa fa-reply"></i></a></span>
  </div>
  <div class="panel-body">
     {{$comment->content}}
  </div>
</div>
