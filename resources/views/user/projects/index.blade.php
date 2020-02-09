@foreach ($projects as $project)
    <h3>{{ $project->name }}</h3>
    <p>{{ $project->company->name }}</p>
@endforeach
