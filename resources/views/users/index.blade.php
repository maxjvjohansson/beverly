<x-dashboard-layout>

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
                <a href="{{ route('users.create') }}" class="add-user-btn">+ Add User</a>
            @endcan
        </div>

        @if($users->isEmpty())
            <p>No users found.</p>
        @else
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
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
                                    <a href="{{ route('users.edit', $user) }}" class="edit">Edit</a>
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
    </section>

</x-dashboard-layout>