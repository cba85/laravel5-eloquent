<h1>{{ $lesson->title }}</h1>

{{ implode(', ', $lesson->tags->pluck('name')->toArray()) }}

<ul>
    @foreach ($lesson->tags as $tag)
        <li>{{ $tag->name }}</li>
    @endforeach
</ul>
