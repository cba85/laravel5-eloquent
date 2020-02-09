<ul>
    @foreach ($topics as $topic)
        <li><a href="{{ route('topics.show', $topic->id) }}">{{ $topic->title }} ({{ $topic->posts->count() }} posts) </a> belongs to {{ $topic->user->name }}</li>
    @endforeach
</ul>
