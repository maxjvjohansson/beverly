<x-layout>
    
    @if(session('success'))
    <div class="alert alert-success">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#173809"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
        {{ session('success') }}
    </div>
    @endif

    <section class="products">
        <div class="header">
            <h2>Products</h2>
            <p>Manage your beverage products</p>
            <button class="add-btn" type="button" onclick="window.location.href='{{ route('products.create') }}'">
                Add Product
            </button>
        </div>
        
        <form action="{{ route('products.index') }}" method="GET" id="filter" class="filter-bar">

            <input type="text" placeholder="Search products..." id="search" name="search" value="{{ request('search') }}">
                
            <select name="category" id="category" onchange="this.form.submit()" id="category">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

        </form><!-- end filter -->

        @if($products->isEmpty())
            <p>No products available.</p>
        @else
            <table class="product-table">
                <thead>
                    <tr>
                        <th>
                            <a href="{{ route('products.index', [
                                'sort_by' => 'id', 
                                'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc',
                                'search' => request()->input('search'),
                                'category' => request()->input('category')
                            ]) }}">
                            ID
                            @if ($sortBy == 'id')
                            <span class="arrow {{ $sortOrder == 'desc' ? 'arrow-up' : 'arrow-down' }}"></span>
                            @endif
                        </th>
                        <th>
                            <a href="{{ route('products.index', [
                                'sort_by' => 'name', 
                                'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc',
                                'search' => request()->input('search'),
                                'category' => request()->input('category')
                            ]) }}">
                            Name
                            @if ($sortBy == 'name')
                            <span class="arrow {{ $sortOrder == 'desc' ? 'arrow-up' : 'arrow-down' }}"></span>
                            @endif
                        </th>
                        <th>
                            <a href="{{ route('products.index', [
                                'sort_by' => 'category', 
                                'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc',
                                'search' => request()->input('search'),
                                'category' => request()->input('category')
                            ]) }}">
                            Category
                            @if ($sortBy == 'category')
                            <span class="arrow {{ $sortOrder == 'desc' ? 'arrow-up' : 'arrow-down' }}"></span>
                            @endif
                        </th>
                        <th>
                            <a href="{{ route('products.index', [
                                'sort_by' => 'price', 
                                'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc',
                                'search' => request()->input('search'),
                                'category' => request()->input('category')
                            ]) }}">
                            Price
                            @if ($sortBy == 'price')
                            <span class="arrow {{ $sortOrder == 'desc' ? 'arrow-up' : 'arrow-down' }}"></span>
                            @endif
                        </th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><span class="id-number">{{ $product->id }}</span></td>
                        <td>
                            <div class="product-info">
                                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                            </div>
                        </td>
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                        <td>${{ $product->price }}</td>
                        <td>
                            <img src="{{ $product->img_url ?? asset('icons/drink.svg') }}"
                            alt="{{ $product->name }}"
                            onerror="this.onerror=null;this.src='{{ asset('icons/drink.svg') }}';" style="width: 3rem; height: 3rem;">
                        </td>
                        <td>
                            <button class="edit" type="button" onclick="window.location.href='{{ route('products.edit', $product->id) }}'">
                                Edit
                            </button><!-- Use icons instead? -->
                            @can('delete', $product)
                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this product?')">
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
            <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} products</p>

            {{ $products->appends(request()->query())->links('vendor.pagination.default') }}
        </div>
        
    </section>
</x-layout>