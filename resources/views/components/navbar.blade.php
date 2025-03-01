<nav class="navbar">
    <section class="menu-heading">
        <h2>Beverly</h2>
    </section>
    
    <ul>
        <li>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li>
            <a href="{{ route('products.index') }}">Products</a>
        </li>
        <li>
            <a href="{{ route('categories.index') }}">Categories</a>
        </li>
        <li>
            <a href="{{ route('users.index') }}">Users</a>
        </li>
    </ul>
</nav>