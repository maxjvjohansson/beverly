<x-layout>
    <section class="categories">
        <h2>Add New Category</h2>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>

            <button type="submit">Add Category</button>
            <a href="{{ route('categories.index') }}" class="back-btn">Back to Categories</a>
        </form>
    </section>
</x-layout>
