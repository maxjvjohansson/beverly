<x-layout>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    <section class="categories">
        <h2>{{ $category->name }}</h2>
        <p><strong>Description:</strong> {{ $category->description }}</p>

        <div class="actions">
            <button class="edit" type="button" onclick="window.location.href='{{ route('categories.edit', $category->id) }}'">
                Edit
            </button><!-- improve accessability with a button -->
            
            @can('delete', $category->id)
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
            </form>
            @endcan

            <a href="{{ route('categories.index') }}" class="back-btn">Back to Categories</a>
        </div>
    </section>

</x-layout>

