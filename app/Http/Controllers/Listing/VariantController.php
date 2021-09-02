<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category, $item, $variant)
    {
        return view('pages.listings.selections.create', compact('category', 'item', 'variant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $category, $item, $variant)
    {
        $validatedData = $this->validate($request, [
            'name' => 'required|string',
            'additional_price' => 'required|numeric|min:0|max:999999',
        ]);

        $validatedData['item_variants_id'] = $variant->id;

        Variant::create($validatedData);

        return redirect()->route('category.item.variants.show', [$category, $item, $variant]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $item, $variant, $selection)
    {
        return view('pages.listings.selections.show', compact('category', 'item', 'variant', 'selection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category, $item, $variant, $selection)
    {
        return view('pages.listings.selections.edit', compact('category', 'item', 'variant', 'selection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category, $item, $variant, $selection)
    {
        $validatedData = $this->validate($request, [
            'name' => 'required|string',
            'additional_price' => 'required|numeric|min:0|max:999999',
        ]);

        $selection->update($validatedData);

        return redirect()->route('category.item.variants.show', [$category, $item, $variant]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category, $item, $variant, $selection)
    {
        $selection->delete();

        return redirect()->route('category.item.variants.show', [$category, $item, $variant]);
    }
}
