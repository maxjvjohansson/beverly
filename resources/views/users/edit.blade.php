<x-layout>
    <h1>Edit Profile</h1>

    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div>
            <label>Current Password</label>
            <input type="password" name="current_password">
        </div>

        <div>
            <label>New Password</label>
            <input type="password" name="password">
        </div>

        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit">Save Changes</button>
    </form>

    <a href="{{ route('users.index') }}">Back to users</a>
</x-layout>
