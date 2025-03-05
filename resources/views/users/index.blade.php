<x-layout>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <section class="users">
        <div class="header">
            <div>
                <h2>Team Members</h2>
                <p>Manage users and roles</p>
            </div>
            @can('manage-users')
            <button class="add-btn" type="button" onclick="window.location.href='{{ route('users.create') }}'">
                <span class="icon">+</span> Add User
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
                                'sort_by' => 'name', 
                                'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc'
                            ]) }}">
                            Name
                            @if ($sortBy == 'name')
                                <span>{{ $sortOrder == 'desc' ? '▲' : '▼' }}</span>
                            @endif
                        </th>
                        <th>
                            <a href="{{ route('users.index', [
                                'sort_by' => 'email', 
                                'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc'
                            ]) }}">
                            Email
                            @if ($sortBy == 'email')
                                <span>{{ $sortOrder == 'desc' ? '▲' : '▼' }}</span>
                            @endif
                        </th>
                        <th>
                            <a href="{{ route('users.index', [
                                'sort_by' => 'role', 
                                'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc'
                            ]) }}">
                            Role
                            @if ($sortBy == 'role')
                                <span>{{ $sortOrder == 'desc' ? '▲' : '▼' }}</span>
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
            {{ $users->appends(request()->query())->links() }}
        </div>

    </section>

</x-layout>