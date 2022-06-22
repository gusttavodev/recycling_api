<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return response()->json($user->products()->with('categories')->get());
    }
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'         => 'required|unique:products|max:255', #TODO UNIQUE PER USER
            'description'  => 'required|max:255',
            'enable'       => 'required|boolean|max:255',
            'categories.*' => 'sometimes'
        ]);

        $product = $user->products()->create($validated);

        $product->categories()->sync($validated['categories'] ?? null);

        return $product;
    }
    public function show($id)
    {
        $user = Auth::user();

        return response()->json($user->products()->with('categories')->find($id));
    }
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'         => 'sometimes|unique:categories,id,' . $id . '|max:255', #TODO UNIQUE PER USER
            'description'  => 'sometimes|max:255',
            'enable'       => 'sometimes|boolean|max:255',
            'categories.*' => 'sometimes'
        ]);

        $product = $user->products()->findOrFail($id);
        $product->update($validated);
        $product->categories()->sync($validated['categories'] ?? null);

        return response()->json($user->products()->with('categories')->findOrFail($id));
    }
    public function destroy($id)
    {
        $user = Auth::user();

        $product = $user->products()->findOrFail($id)->delete();

        return response()->json($product);
    }
}
