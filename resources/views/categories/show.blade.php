<x-layout>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    <section class="show">
        <h2>Show Category</h2>
        <article>
            <p><strong>Name</strong>: {{ $category->name }}</p>
            <p><strong>Description:</strong> {{ $category->description }}</p>

            <div class="actions">
                <button class="edit" type="button" onclick="window.location.href='{{ route('categories.edit', $category->id) }}'">
                    Edit
                </button>
                
                @can('delete', $category)
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this category?')">
                            Delete
                        </button>
                    </form>
                @endcan

                <a href="{{ route('categories.index') }}" class="back-btn">Back to Categories</a>
            </div>
        </article>
    </section>

</x-layout>

