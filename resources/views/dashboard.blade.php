<x-layout>

    <section class="dashboard">

        <h2>Welcome back <strong>{{ $user->name }}</strong>, to beverly dashboard!</h2>
        <p>Behind every great drink is a great admin</p>
        
        <img src="{{ asset('icons/drink.svg') }}" alt="Beverly logotype" />

    </section>


</x-layout>