<x-layout>

    <section class="categories">

        @if(session('success'))
        <aside class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#173809"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
            {{ session('success') }}
        </aside>
        @endif

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
            <p>Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} categories</p>

            {{ $categories->appends(request()->query())->links('vendor.pagination.default') }}
        </div>

    </section><!-- categories -->

</x-layout>