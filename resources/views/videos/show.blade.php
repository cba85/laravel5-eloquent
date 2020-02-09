<h1>{{ $video->title }}</h1>

@if ($video->comments->count())
    @foreach ($video->comments as $comment)
        <p>{{ $comment->body }}</p>
        <small>By {{ $comment->user->name }}</small>
    @endforeach
@else
    <p>No comments for this video.</p>
@endif
