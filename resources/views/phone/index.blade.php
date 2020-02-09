@foreach ($phones as $phone)
    <ul>
        <li>{{ $phone->phone_number }} belongs to {{ $phone->user->name }}</li>
    </ul>
@endforeach
