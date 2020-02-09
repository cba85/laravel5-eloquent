<h1>{{ $article->title }}</h1>

@if ($article->comments->count())
    @foreach ($article->comments as $comment)
        <p>{{ $comment->body }}</p>
        <small>By {{ $comment->user->name }}</small>
    @endforeach
@else
    <p>No comments for this article.</p>
@endif
