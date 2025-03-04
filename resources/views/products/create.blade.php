<x-layout>
    <section class="add-product">
        <h2>Add New Product</h2>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" required>

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

            <button type="submit">Add Product</button>
            <a href="{{ route('products.index') }}" class="back-btn">Back to Products</a>
        </form>
    </section>
</x-layout>
