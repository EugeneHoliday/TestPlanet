@extends('layouts.main')


@section('content')
<div class="post commentable" data-id="{{$post->id}}" data-type="Post">
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
            $( '#form-add-comment').hide();
            $( '.reply a' ).on( 'click', function() {
//                $( '#form-add-comment' ).append('')
                var form = $( '#form-add-comment');
                form.find('textarea').each(function(){
                    $(this).val('');
                });
                var comment = $(this).closest('.commentable');
                form.hide().appendTo(comment).slideDown(300);
            });

            $( '#form-add-comment' ).on( 'submit', function() {

                //.....
                //show some spinner etc to indicate operation in progress
                //.....
                var form = $(this);
                var parent = $(this).closest('.commentable');
                $.post(
                    $( this ).prop( 'action' ),
                    {
                        "_token": $( this ).find( 'input[name=_token]' ).val(),
                        "comment_content": $( '#comment_content' ).val(),
                        "parent_id": parent.data('id'),
                        "parent_type": parent.data('type')

                    },
                    function( html ) {
                        console.log(html);
                        form.hide();
                        var replies = parent.children('div.replies');
                        if(replies.length === 0){
                            replies = $('<div class="replies"></div>   ')
                                    .appendTo(parent);
                        }
                        console.log(parent.html());
                        parent.children('.replies').append(html);
                    }
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