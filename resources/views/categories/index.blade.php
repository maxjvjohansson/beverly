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
            <button class="add-btn" type="button" onclick="window.location.href='{{ route('categories.create') }}'">
                <span class="icon">+</span> Add Category
            </button><!-- improve accessability with a button -->
        </header>
    
        @if($categories->isEmpty())
        <p>No categories available.</p>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <a href="{{ route('categories.index', [
                            'sort_by' => 'id', 
                            'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc'
                        ]) }}">
                        ID
                        @if ($sortBy == 'id')
                            <span>{{ $sortOrder == 'desc' ? '▲' : '▼' }}</span>
                        @endif
                    </th>
                    <th>
                        <a href="{{ route('categories.index', [
                            'sort_by' => 'name', 
                            'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc'
                        ]) }}">
                        Name
                        @if ($sortBy == 'name')
                            <span>{{ $sortOrder == 'desc' ? '▲' : '▼' }}</span>
                        @endif
                    </th>
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

                        @can('delete', $category)
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this category?')">
                                    Delete
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <div class="pagination">
            {{ $categories->appends(request()->query())->links() }}
        </div>

    </section><!-- categories -->

</x-layout>