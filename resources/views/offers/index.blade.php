<x-layout title="Marketplace">
    <x-slot name="title">Marketplace</x-slot>
    <h1 class="mb-4">Marketplace</h1>
    @if ($offers->count())
        <div class="row">
        @foreach ($offers as $offer)
            <div class="col-md-6 col-lg-4">
                <x-offer-card :offer="$offer" />
            </div>
        @endforeach
        </div>
    @else
        <div class="alert alert-info">No offers available</div>
    @endif
</x-layout>