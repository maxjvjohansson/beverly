<x-layout>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <section class="categories">
        <h2>Edit Category</h2>

        <article>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description', $category->description) }}</textarea>

            <button type="submit">Save Changes</button>
            <a href="{{ route('categories.index') }}" class="back-btn">Back to Categories</a>
        </form>
        </article>
    </section>
</x-layout>
