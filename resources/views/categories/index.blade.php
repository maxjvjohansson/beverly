<x-layout>

    <section class="categories">

        <x-message/>

        <header class="header">
            <h2>Categories</h2>
            <p>Manage beverage categories</p>
            <button class="add-btn" type="button" onclick="window.location.href='{{ route('categories.create') }}'">
                Add Category
            </button>
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
                        <span class="arrow {{ $sortOrder == 'desc' ? 'arrow-up' : 'arrow-down' }}"></span>
                        @endif
                    </th>
                    <th>
                        <a href="{{ route('categories.index', [
                            'sort_by' => 'name', 
                            'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc'
                        ]) }}">
                        Name
                        @if ($sortBy == 'name')
                        <span class="arrow {{ $sortOrder == 'desc' ? 'arrow-up' : 'arrow-down' }}"></span>
                        @endif
                    </th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td><span class="id-number">{{ $category->id }}</span></td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="edit">{{ $category->name }}</a></td>
                    <td>{{ $category->description }}</td>
                    <td>
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
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <div class="pagination">
            <p>Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} categories</p>

            {{ $categories->appends(request()->query())->links('vendor.pagination.default') }}
        </div>

    </section>

</x-layout>