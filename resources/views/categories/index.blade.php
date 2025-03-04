<x-layout>

    <section class="categories">

        @if(session('success'))
        <aside class="alert alert-success">
            {{ session('success') }}
        </aside>
        @endif

        <header class="header">
            <h2>Categories</h2>
            <p>Manage beverage categories</p>
            <button class="add-product-btn" type="button" onclick="window.location.href='{{ route('categories.create') }}'">
                <span class="icon">+</span> Add Category
            </button><!-- improve accessability with a button -->
        </header>
    
        @if($categories->isEmpty())
        <p>No categories available.</p>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td><span class="category-id">{{ $category->id }}</span></td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="edit">{{ $category->name }}</a></td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <button class="edit" type="button" onclick="window.location.href='{{ route('categories.edit', $category->id) }}'">
                            Edit
                        </button><!-- improve accessability with a button -->

                        @can('delete', $category->id)
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

    </section><!-- categories -->

</x-layout>