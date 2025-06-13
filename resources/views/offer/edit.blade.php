<x-layout title="Edit offer">
    <x-slot name="title">Edit offer</x-slot>
    <h1 class="mb-4 text-center">Edit offer</h1>
    <form method="POST" action="{{ route('offer.update', $offer) }}" enctype="multipart/form-data">
        @csrf
        @method ('PUT')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $offer->name) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $offer->price) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Expiry date</label>
            <input type="date" name="expiryDate" class="form-control" value="{{ old('expiryDate', $offer->expiryDate) }}">
        </div>
        <div>
            <label class="form-label">Image</label>
            <input type="file" name="imagePath" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Product category</label>
            <select name="product_category_id" class="form-select">
                <option value="">Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"{{ old('product_category_id', $offer->product_category_id) == $category->id ? 'selected' : '' }}>{{ $category->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Region</label>
            <select name="latvian_region_id" class="form-select">
                <option value="">Select region</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}"{{ old('latvian_region_id', $offer->latvian_region_id) == $region->id ? 'selected' : '' }}>{{ $region->region }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="5">{{ old('description', $offer->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update offer</button>
    </form>
</x-layout>