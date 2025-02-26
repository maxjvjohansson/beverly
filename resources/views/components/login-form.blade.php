<form method="POST" action="/login" id="login-form">
    @csrf
    
    <h2>Login</h2>

    <!-- labels are only for screen readers, they are hidden with css, using placeholders within the input fields instead for styling purposes -->
    <label for="email">Email: </label>
    <input placeholder="Email" name="email" type="email" required>

    <label for="email">Password: </label>
    <input placeholder="Password" name="password" type="password" required>

    <button type="submit">Login</button>

    @if ($errors->has('login'))
    <div class="error-message">
        <p>{{ $errors->first('login') }}</p>
    </div>
    @endif

</form>
