<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
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
    public function create($category)
    {
        return view('pages.listings.items.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $category)
    {
        
        $this->validate($request, [
            'item_name' => 'required|string',
            'price' => 'required|numeric',
            'itemAvailabilityRadioOptions' => 'required|boolean',
            'photo' => 'nullable|string'
        ]);

        Item::create([
            'name' => $request['item_name'],
            'price' => $request['price'],
            'item_categories_id' => $category->id,
            'is_available' => $request['itemAvailabilityRadioOptions'],
            'photo' => $request['photo'],
        ]);

        return redirect()->route('category.show', $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $item)
    {
        return view('pages.listings.items.show', compact('category', 'item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category, $item)
    {
        return view('pages.listings.items.edit', compact('category', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category, $item)
    {
        $this->validate($request, [
            'item_name' => 'required|string',
            'price' => 'required|numeric',
            'itemAvailabilityRadioOptions' => 'required|boolean',
            'photo' => 'nullable|string'
        ]);

        $item->fill([
            'name' => $request['item_name'],
            'price' => $request['price'],
            'is_available' => $request['itemAvailabilityRadioOptions'],
        ]);

        if ($request->has('photo')) {
            $item->photo = $request['photo'];
        }

        $item->save();

        return redirect()->route('category.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category, $item)
    {
        $item->delete();

        return redirect()->route('category.show', $category->id);
    }
}
