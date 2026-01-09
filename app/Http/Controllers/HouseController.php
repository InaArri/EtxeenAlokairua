<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        $houses = \App\Models\House::with('tenants')->get();
        return view('houses.index', compact('houses'));
    }

    public function edit($id)
    {
        $house = \App\Models\House::findOrFail($id);
        return view('houses.edit', compact('house'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:255|unique:houses,address,' . $id,
            'bedrooms' => 'required|integer|min:1|max:10',
            'year_built' => 'required|integer|min:1800|max:' . date('Y'),
        ]);

        $house = \App\Models\House::findOrFail($id);
        $house->update($validated);

        return redirect()->route('houses.index')->with('success', 'House updated successfully!');
    }
}
