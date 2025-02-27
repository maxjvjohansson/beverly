<x-dashboard-layout>

    <section class="products">
        <h2>Products</h2>

        @if($products->isEmpty())
            <p>No products available.</p>
        @else
            <table class="product-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>
                            <a href="#">Edit</a>
                            <a href="#" class="delete">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </section>

</x-dashboard-layout>