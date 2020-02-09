<h1>Subjects</h1>

@foreach ($tag->subjects as $subject)
    <h3>{{ $subject->title }}</h3>
    @foreach ($subject->tags as $tag)
        <span>{{ $tag->name }}</span>
    @endforeach
@endforeach

<h1>Lessons</h1>

@foreach ($tag->lessons as $lesson)
    <h3>{{ $lesson->title }}</h3>
    @foreach ($lesson->tags as $tag)
        <span>{{ $tag->name }}</span>
    @endforeach
@endforeach
