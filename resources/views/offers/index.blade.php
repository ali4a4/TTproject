<x-layout title="Marketplace">
    <x-slot name="title">Marketplace</x-slot>
    <h1 class="mb-4 text-center">Marketplace</h1>
    <div class="d-flex">
        <form action="{{ route('offer.index') }}" method="GET">
            <button type="submit" class="btn btn-primary" style="width: 308px;">Sort</button>
            <div class="d-flex">
                <div>
                    <select name="product_category_id" class="custom-select" size="15" multiple>
                        <option value="">All</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"{{ request('product_category_id') == $category->id ? 'selected' : '' }}>{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select name="latvian_region_id" class="custom-select" size="46" multiple>
                        <option value="">All</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}"{{ request('latvian_region_id') == $region->id ? 'selected' : '' }}>{{ $region->region }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <div>
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
        </div>
    </div>
</x-layout>