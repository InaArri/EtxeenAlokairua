<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = \App\Models\Tenant::with('house')->get();
        return response()->json($tenants);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'house_id' => 'nullable|exists:houses,id',
        ]);

        $tenant = \App\Models\Tenant::findOrFail($id);
        $tenant->update($validated);

        return response()->json($tenant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tenant = \App\Models\Tenant::findOrFail($id);
        $tenant->delete();
        return response()->json(['message' => 'Tenant deleted successfully'], 200);
    }
}
