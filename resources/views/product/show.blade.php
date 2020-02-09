<h1>{{ $product->title }}</h1>

@if ($product->categories->count())
    <ul>
    @foreach($product->categories as $category)
        <li>{{ $category->title }} | Category created at: {{ $category->created_at->diffForHumans() }} | Added at {{ $category->pivot->added_at }} | Visible: {{ $category->visible ? 'no' : 'yes' }}</li>
    @endforeach
    </ul>
@endif
