<form method="POST" action="/login">
    @csrf
    <input placeholder="Email" type="email" required>
    <input placeholder="Password" type="password" required>
    <input type="submit" value="Login">
</form>
