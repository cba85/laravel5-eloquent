@foreach ($lessons as $lesson)
    <h3>{{ $lesson->title }}</h3>
    <ul>
        @foreach ($lesson->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>
@endforeach
