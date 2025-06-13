<div class="card mb-3 shadow-sm">
    <div class="card-body">
        <h5 class="card-title">{{ $offer->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $offer->price }}€</h6>
        <img src="{{ asset('storage/' . $offer->imagePath) }}" alt="Image" width="250">
        <a href="{{ route('offer.show', $offer->id) }}" class="btn btn-primary">Details</a>
    </div>
</div>