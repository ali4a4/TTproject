<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\ProductCategory;
use App\Models\LatvianRegion;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Offer $offer)
    {
        $offers = Offer::all();
        return view('offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', App\Models\Offer::class)) abort(403, 'You are not authorized to create this offer');
        $categories = ProductCategory::all();
        $regions = LatvianRegion::all();
        return view('offers.create', compact('categories', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        if ($request->user()->cannot('create', App\Models\Offer::class)) abort(403, 'You are not authorized to store this offer');
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'expiryDate' => 'required|date',
            'description' => 'required',
            'imagePath' => 'required|image|mimes:png,jpg,jpeg',
            'product_category_id' => 'required|exists:product_categories,id',
            'latvian_region_id' => 'required|exists:latvian_regions,id'
        ]);
        $imagePathReal = $request->file('imagePath')->store('offers', 'public');
        Offer::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'expiryDate' => $validated['expiryDate'],
            'description' => $validated['description'],
            'imagePath' => $imagePathReal,
            'isHidden' => 0,
            'user_id' => Auth::id(),
            'product_category_id' => $validated['product_category_id'],
            'latvian_region_id' => $validated['latvian_region_id']
        ]);
        return redirect()->route('offer.index')->with('success', 'Offer created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $offer = Offer::findOrFail($id);
        return view('offer.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $offer = Offer::findOrFail($id);
        if ($request->user()->cannot('update', $offer)) abort(403, 'You are not authorized to edit this offer');
        $categories = ProductCategory::all();
        $regions = LatvianRegion::all();
        return view('offer.edit', compact('offer', 'categories', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'expiryDate' => 'required|date',
            'description' => 'required',
            'imagePath' => 'required|image|mimes:png,jpg,jpeg',
            'product_category_id' => 'required|exists:product_categories,id',
            'latvian_region_id' => 'required|exists:latvian_regions,id'
        ]);
        $offer = Offer::findOrFail($id);
        if ($request->user()->cannot('update', $offer)) abort(403, 'You are not authorized to update this offer');
        Storage::disk('public')->delete($offer->imagePath);
        $imagePathReal = $request->file('imagePath')->store('offers', 'public');
        $validated['imagePath'] = $imagePathReal;
        $offer->update($validated);
        return redirect()->route('offer.show', $offer->id)->with('success', 'Offer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Offer $offer)
    {
        if ($request->user()->cannot('delete', $offer)) abort(403, 'You are not authorized to delete this offer');
        Storage::disk('public')->delete($offer->imagePath);
        $offer->delete();
        return redirect()->route('offer.index')->with('success', 'Offer deleted successfully.');
    }

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
}
