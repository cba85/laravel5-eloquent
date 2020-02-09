<h1>{{ $category->title }}</h1>

@if ($category->products->count())
    <ul>
    {{--
    @foreach($category->products as $product)
        <li>{{ $product->title }} : {{ number_format($product->price, 2, ',', ' ') }} €</li>
    @endforeach
    --}}
    @foreach($products as $product)
        <li>{{ $product->title }} : {{ number_format($product->price, 2, ',', ' ') }} €</li>
    @endforeach
    </ul>

    {{ $products->links() }}
@endif
