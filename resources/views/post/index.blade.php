<ul>
    @foreach ($posts as $post)
        <li>{{ $post->body }} belongs to {{ $post->user->name }}</li>
    @endforeach
</ul>
