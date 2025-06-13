<x-layout title="{{ $offer->title }}">
    <h1>{{ $offer->name }}</h1>
    <p>{{ $offer->price }}</p>
    <p>{{ $offer->product_category_id }}</p>
    <p>{{ $offer->latvian_region_id }}</p>
    <p>{{ $offer->description }}</p>
    <img src="{{ asset('storage/' . $offer->imagePath) }}" alt="Image" width="300">
    @auth
        @can('update', $offer)
            <a href="{{ route('offer.edit', $offer->id) }}">Edit offer</a>
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