<ul>
    @foreach ($posts as $post)
        <li>{{ $post->body }} belongs to <a href="{{ route('topics.show', $post->topic) }}">{{ $post->topic->title }}</a></li>
    @endforeach
</ul>
