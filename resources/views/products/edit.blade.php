<x-layout>
    <section class="edit">
        <h2>Edit Product</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>

            <label for="volume">Volume</label>
            <input type="number" id="volume" name="volume" value="{{ old('volume', $product->volume) }}" step="1" required>

            <label for="unit">Unit</label>
            <select id="unit" name="unit" required>
                <option value="ml" {{ old('unit', $product->unit) == 'ml' ? 'selected' : '' }}>ml</option>
                <option value="cl" {{ old('unit', $product->unit) == 'cl' ? 'selected' : '' }}>cl</option>
                <option value="l" {{ old('unit', $product->unit) == 'l' ? 'selected' : '' }}>l</option>
                <option value="fl oz" {{ old('unit', $product->unit) == 'fl oz' ? 'selected' : '' }}>fl oz</option>
                <option value="g" {{ old('unit', $product->unit) == 'g' ? 'selected' : '' }}>g</option>
                <option value="pcs" {{ old('unit', $product->unit) == 'pcs' ? 'selected' : '' }}>pcs</option>
            </select>

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

            <label>Image URL (optional)</label>
            <input type="url" name="img_url" value="{{ old('img_url', $product->img_url) }}">

            <button type="submit" class="save">Save</button>
            <a href="{{ route('products.index') }}" class="back-btn">Back to Products</a>
        </form>
    </section>
</x-layout>
