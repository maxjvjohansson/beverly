<x-layout>
    <section class="edit">
        <h2>Create New User</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('users.store') }}" class="form-container">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="employee" {{ old('role') === 'employee' ? 'selected' : '' }}>Employee</option>
                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>

            <button type="submit" class="save">Save</button>
            <a href="{{ route('users.index') }}" class="back-link">Back to Users</a>
        </form>

    </section>
</x-layout>