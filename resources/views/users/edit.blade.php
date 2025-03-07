<x-layout>
    <section class="edit">
        <h2>Edit Profile</h2>

        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')

            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
            
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            
            <details>
                <summary>Change password</summary>
                <label>Current Password</label>
                <input type="password" name="current_password">
                
                <label>New Password</label>
                <input type="password" name="password">
                
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation">
            </details>

            <button type="submit" class="save">Save</button>
            <a href="{{ route('users.index') }}">Back to users</a>
        </form>

    </section>
</x-layout>
