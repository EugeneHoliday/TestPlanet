{{ Form::open( [
    'route' => 'comments.store',
    'method' => 'post',
    'id' => 'form-add-comment',
] ) }}

<div class="form-group">
    {{ Form::textarea( 'content', '', [
        'id' => 'comment_content',
        'placeholder' => 'Enter comment',
        'class' => 'form-control',
        'required' => true,
    ] ) }}
</div>

{{ Form::submit( 'Add', ['id' => 'btn-add-comment', 'class' => 'btn btn-default'] ) }}

{{ Form::close() }}