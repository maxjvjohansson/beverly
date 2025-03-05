<x-layout>

    <section class="product-details">
        <h2>{{ $product->name }}</h2>

        <img src="{{ $product->img_url ?? asset('images/fallback-drink.svg') }}"
        alt="{{ $product->name }}"
        onerror="this.onerror=null;this.src='{{ asset('images/fallback-drink.svg') }}';">

        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
        <p><strong>Price:</strong> ${{ $product->price }}</p>

        <div class="actions">
            <button class="edit" type="button" onclick="window.location.href='{{ route('products.edit', $product->id) }}'">
                Edit
            </button>

            @can('delete', $product)
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this product?')">
                        Delete
                    </button>
                </form>
            @endcan

            <a href="{{ route('products.index') }}" class="back-btn">Back to Products</a>
        </div>
    </section>

</x-layout>
