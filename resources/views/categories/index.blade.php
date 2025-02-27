<x-dashboard-layout>
    <section class="categories">
        <div class="header">
                <h2>Categories</h2>
            </div>
    
        @if($categories->isEmpty())
            <p>No categories available.</p>
        @else
            <table class="category-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                            <a href="#" class="edit">Edit</a>
                            <a href="#" class="delete">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </section>
</x-dashboard-layout>