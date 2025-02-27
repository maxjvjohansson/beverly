<x-dashboard-layout>
    <section class="products">
        <div class="header">
            <div>
                <h2>Products</h2>
                <p>Manage your beverage products</p>
            </div>
            <button class="add-product">+ Add Product</button> <!-- Change the + to an icon instead -->
        </div>
        
        <div class="filter-bar">
            <input type="text" placeholder="Search products..." id="search">
            <select id="category">
                <option value="">All Categories</option> <!-- Add categories dynamically-->
            </select>
            <select id="sort">
                <option value="price_asc">Price: Low to High</option>
                <option value="price_desc">Price: High to Low</option>
            </select>
        </div>

        @if($products->isEmpty())
            <p>No products available.</p>
        @else
            <table class="product-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <div class="product-info">
                                <span>{{ $product->name }}</span>
                            </div>
                        </td>
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                        <td>${{ $product->price }}</td>
                        <td>
                            <a href="#" class="edit">Edit</a> <!-- Use icons instead? -->
                            <a href="#" class="delete">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="pagination">
            {{ $products->links() }}
        </div>
    </section>
</x-dashboard-layout>