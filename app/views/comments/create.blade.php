{{ Form::open( [
    'route' => 'comments.create',
    'method' => 'post',
    'id' => 'form-add-comment'
] ) }}


{{ Form::textarea( 'comment_content', '', [
    'id' => 'comment_content',
    'placeholder' => 'Enter comment',
    'class' => 'form-control',
    'required' => true,
] ) }}


{{ Form::submit( 'Add', ['id' => 'btn-add-comment', 'class' => 'btn btn-default'] ) }}

{{ Form::close() }}