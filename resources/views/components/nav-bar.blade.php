<nav>
    <a href="{{ route('offer.index') }}">index</a>
    @auth
        @can('create', \App\Models\Offer::class)
            <a href="{{ route('offer.create') }}">create</a>
        @endcan
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">logout</button>
        </form>
    @endauth
    @guest
        <a href="{{ route('login') }}">login</a>
        <a href="{{ route('register') }}">register</a>
    @endguest
</nav>