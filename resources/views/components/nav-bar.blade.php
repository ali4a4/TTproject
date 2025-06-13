<nav class="bg-secondary p-3 d-flex justify-content-between">
    <div>
        <a href="{{ route('offer.index') }}" class="btn btn-primary"><b>Marketplace</b></a>
        @auth
            @can('create', \App\Models\Offer::class)
                <a href="{{ route('offer.create') }}" class="btn btn-primary"><b>Create offer</b></a>
            @endcan
    </div>
    <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary"><b>Logout</b></button>
            </form>
        @endauth
        @guest
    </div>
    <div>
            <a href="{{ route('login') }}" class="btn btn-primary"><b>Login</b></a>
            <a href="{{ route('register') }}" class="btn btn-primary"><b>Register</b></a>
        @endguest
    </div>
</nav>