<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = \App\Models\Tenant::with('house')->get();
        return view('tenants.index', compact('tenants'));
    }

    public function edit($id)
    {
        $tenant = \App\Models\Tenant::findOrFail($id);
        $houses = \App\Models\House::all();
        return view('tenants.edit', compact('tenant', 'houses'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'house_id' => 'nullable|exists:houses,id',
        ]);

        $tenant = \App\Models\Tenant::findOrFail($id);
        $tenant->update($validated);

        return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully!');
    }

    public function destroy($id)
    {
        $tenant = \App\Models\Tenant::findOrFail($id);
        $tenant->delete();

        return redirect()->route('tenants.index')->with('success', 'Tenant deleted successfully!');
    }
}
