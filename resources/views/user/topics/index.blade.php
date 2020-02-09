<ul>
    @foreach ($topics as $topic)
        <li><a href="{{ route('topics.show', $topic->id) }}">{{ $topic->title }}</a> created at {{ $topic->created_at->diffForHumans() }}</li>
    @endforeach
</ul>
