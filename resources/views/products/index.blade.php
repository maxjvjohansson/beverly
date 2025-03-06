<x-layout>
    
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <section class="products">
        <div class="header">
            <div>
                <h2>Products</h2>
                <p>Manage your beverage products</p>
            </div>
            <button class="add-btn" type="button" onclick="window.location.href='{{ route('products.create') }}'">
                <span class="icon">+</span> Add Product
            </button> <!-- Change the + to an icon instead -->
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
        
            <select name="price_order" onchange="this.form.submit()" id="sort">
                <option value="">Sort by price</option>
                <option value="asc" {{ request('price_order') == 'asc' ? 'selected' : '' }}>Lowest to Highest</option>
                <option value="desc" {{ request('price_order') == 'desc' ? 'selected' : '' }}>Highest to Lowest</option>
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
                                <span>{{ $sortOrder == 'desc' ? '▲' : '▼' }}</span>
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
                                <span>{{ $sortOrder == 'desc' ? '▲' : '▼' }}</span>
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
                                <span>{{ $sortOrder == 'desc' ? '▲' : '▼' }}</span>
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
                                <span>{{ $sortOrder == 'desc' ? '▲' : '▼' }}</span>
                            @endif
                        </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <div class="product-info">
                                <img src="{{ $product->img_url ?? asset('icons/drink.svg') }}"
                                    alt="{{ $product->name }}"
                                    onerror="this.onerror=null;this.src='{{ asset('icons/drink.svg') }}';" style="width: 3rem; height: 3rem;">

                                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                            </div>
                        </td>
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                        <td>${{ $product->price }}</td>
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