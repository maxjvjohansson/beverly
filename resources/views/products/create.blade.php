<x-layout>
    <section class="edit">
        <h2>Add New Product</h2>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="volume">Volume</label>
            <input type="number" id="volume" name="volume" step="1" required>

            <label for="unit">Unit</label>
            <select id="unit" name="unit" required>
                <option value="" disabled selected>Select Unit</option>
                <option value="ml">ml</option>
                <option value="cl">cl</option>
                <option value="l">l</option>
                <option value="fl oz">fl oz</option>
                <option value="g">g</option>
                <option value="pcs">pcs</option>
            </select>

            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>

            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label for="price">Price</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="img_url">Image URL (optional)</label>
            <input type="url" name="img_url" value="{{ old('img_url') }}">

            <button type="submit" class="save">Save</button>
            <a href="{{ route('products.index') }}" class="back-btn">Back to Products</a>
        </form>
    </section>
</x-layout>
