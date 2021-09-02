<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\ItemVariant;
use Illuminate\Http\Request;

class ItemVariantController extends Controller
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
    public function create($category, $item)
    {
        return view('pages.listings.variants.create', compact('category', 'item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $category, $item)
    {
        $validatedData = $this->validate($request, [
            'name' => 'required|string',
            'min' => 'required|numeric|lte:max',
            'max' => 'required|numeric|gte:max',
        ]);

        $validatedData['item_id'] = $item->id;

        ItemVariant::create($validatedData);

        return redirect()->route('category.item.show', [$category, $item]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $item, $variant)
    {
        return view('pages.listings.variants.show', compact('category', 'item', 'variant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category, $item, $variant)
    {
        return view('pages.listings.variants.edit', compact('category', 'item', 'variant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category, $item, $variant)
    {
        $validatedData = $this->validate($request, [
            'name' => 'required|string',
            'min' => 'required|numeric|lte:max',
            'max' => 'required|numeric|gte:max',
        ]);

        $variant->update($validatedData);

        return redirect()->route('category.item.show', [$category, $item]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category, $item, $variant)
    {
        $variant->delete();

        return redirect()->route('category.item.show', [$category, $item]);
    }
}
