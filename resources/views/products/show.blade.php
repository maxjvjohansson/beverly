<x-dashboard-layout>

    <section class="product-details">
        <h2>{{ $product->name }}</h2>

        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
        <p><strong>Price:</strong> ${{ $product->price }}</p>

        <div class="actions">
            <a href="{{ route('products.edit', $product->id) }}" class="edit-btn">Edit</a>

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

</x-dashboard-layout>
