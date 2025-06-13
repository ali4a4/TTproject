<x-layout title="{{ $offer->title }}">
    <h1>Name: {{ $offer->name }}</h1>
    <p>Price: {{ $offer->price }}€</p>
    <p>Product category: {{ $offer->product_category->category }}</p>
    <p>Region: {{ $offer->latvian_region->region }}</p>
    <p>Contact: {{ $offer->user->email }}</p>    
    <p>Description: {{ $offer->description }}</p>
    <img src="{{ asset('storage/' . $offer->imagePath) }}" alt="Image" width="300"><br>
    @auth
        @can('update', $offer)
            <a href="{{ route('offer.edit', $offer->id) }}" class="btn btn-primary">Edit offer</a>
        @endcan
        @can('delete', $offer)
            <form action="{{ route('offer.destroy', $offer) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this offer?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endcan
    @endauth
</x-layout>