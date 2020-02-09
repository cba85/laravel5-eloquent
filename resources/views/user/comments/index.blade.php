@foreach ($comments as $comment)
    <p>{{ $comment->body }}</p>
    <a href="#">{{ $comment->commentable->getTitle() }}</a>
@endforeach
