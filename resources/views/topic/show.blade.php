<h1>{{ $topic->title }}</h1>

@if ($topic->posts->count())
    <ul>
        @foreach ($topic->posts as $post)
            <li>{{ $post->body }} by {{ $post->user->name }}</li>
        @endforeach
    </ul>
@else
    <p>This topic doesn't contain posts.</p>
@endif
