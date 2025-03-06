<nav class="navbar">
    <section class="menu-heading">
        <img src="./icons/logo_beverly.svg" alt="Beverly logotype" />
        <h2>Beverly</h2>
    </section>

    <ul>
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}">Products</a></li>
        <li><a href="{{ route('categories.index') }}">Categories</a></li>
        <li><a href="{{ route('users.index') }}">Users</a></li>
    </ul>

    <footer class="navbar-footer">
        <a href="{{ route('users.edit', auth()->user()) }}" class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </a>        
            <x-logout-form />
    </footer>
</nav>
