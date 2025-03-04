<x-layout>
    <section class="edit-product">
        <h2>Edit Product</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description', $product->description) }}</textarea>

            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <label for="price">Price</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" required>

            <button type="submit">Save Changes</button>
            <a href="{{ route('products.index') }}" class="back-btn">Back to Products</a>
        </form>
    </section>
</x-layout>
