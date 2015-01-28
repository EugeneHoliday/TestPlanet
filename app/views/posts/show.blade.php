@extends('layouts.main')


@section('content')
<div class="post commentable">
    <h1>{{$post->title}}</h1>
    <p>{{$post->description}}</p>
    <span class="reply"><a href="#post">Reply <i class="fa fa-reply"></i></a></span>
</div>

<div class="comments">
    {{View::make('posts.comments', ['comments' => $post->comments])->render()}}
</div>

@include('comments.create')

@stop

@section('script')
    <script type="text/javascript">
        jQuery( document ).ready( function( $ ) {

            $( '.reply a' ).on( 'click', function() {
//                $( '#form-add-comment' ).append('')
                var comment = $(this).closest('.commentable');
                comment.append($( '#form-add-comment' ));
            });

            $( '#form-add-comment' ).on( 'submit', function() {

                //.....
                //show some spinner etc to indicate operation in progress
                //.....

                $.post(
                    $( this ).prop( 'action' ),
                    {
                        "_token": $( this ).find( 'input[name=_token]' ).val(),
                        "comment_content": $( '#comment_content' ).val(),
                    },
                    function( data ) {
                        //do something with data/response returned by server
                    },
                    'json'
                );

                //.....
                //do anything else you might want to do
                //.....

                //prevent the form from actually submitting in browser
                return false;
            } );

        } );
    </script>
@stop