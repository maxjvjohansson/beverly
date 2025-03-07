<x-layout>

    @if(session('success'))
        <div class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#173809"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <section class="users">
        <div class="header">
            <h2>Team Members</h2>
            <p>Manage users and roles</p>
            @can('manage-users')
            <button class="add-btn" type="button" onclick="window.location.href='{{ route('users.create') }}'">
                Add User
            </button>
            @endcan
        </div>

        @if($users->isEmpty())
            <p>No users found.</p>
        @else
            <table class="user-table">
                <thead>
                    <tr>
                        <th>
                            <a href="{{ route('users.index', [
                                'sort_by' => 'id', 
                                'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc'
                            ]) }}">
                            ID
                            @if ($sortBy == 'id')
                            <span class="arrow {{ $sortOrder == 'desc' ? 'arrow-up' : 'arrow-down' }}"></span>
                            @endif
                        </th>
                        <th>
                            <a href="{{ route('users.index', [
                                'sort_by' => 'name', 
                                'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc'
                            ]) }}">
                            Name
                            @if ($sortBy == 'name')
                            <span class="arrow {{ $sortOrder == 'desc' ? 'arrow-up' : 'arrow-down' }}"></span>
                            @endif
                        </th>
                        <th>
                            <a href="{{ route('users.index', [
                                'sort_by' => 'email', 
                                'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc'
                            ]) }}">
                            Email
                            @if ($sortBy == 'email')
                            <span class="arrow {{ $sortOrder == 'desc' ? 'arrow-up' : 'arrow-down' }}"></span>
                            @endif
                        </th>
                        <th>
                            <a href="{{ route('users.index', [
                                'sort_by' => 'role', 
                                'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc'
                            ]) }}">
                            Role
                            @if ($sortBy == 'role')
                            <span class="arrow {{ $sortOrder == 'desc' ? 'arrow-up' : 'arrow-down' }}"></span>
                            @endif
                        </th>
                        @can('manage-users')
                            <th>Actions</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><span class="id-number">{{ $user->id }}</span></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @can('manage-users')
                                    <form method="POST" action="{{ route('users.updateRole', $user) }}" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <select name="role" onchange="this.form.submit()" class="role-selector">
                                            <option value="employee" {{ $user->role === 'employee' ? 'selected' : '' }}>Employee</option>
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </form>
                                @else
                                    {{ ucfirst($user->role) }} 
                                @endcan
                            </td>
                            @can('manage-users')
                                <td>
                                    <button class="edit" type="button" onclick="window.location.href='{{ route('users.edit', $user->id) }}'">
                                        Edit
                                    </button>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?')">
                                            Delete
                                        </button>
                                    </form>                                    
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="pagination">
            <p>Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users</p>
            
            {{ $users->appends(request()->query())->links('vendor.pagination.default') }}
        </div>

    </section>

</x-layout>