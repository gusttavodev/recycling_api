<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return response()->json($user->categories);
    }
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'   => 'required|unique:categories|max:255', #TODO UNIQUE PER USER
            'color'  => 'required|max:255',
            'enable' => 'required|boolean|max:255',
        ]);

        $category = $user->categories()->create($validated);

        return response()->json($category);
    }
    public function show($id)
    {
        $user = Auth::user();

        return response()->json($user->categories()->find($id));
    }
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'   => 'sometimes|unique:categories,id,' . $id . '|max:255', #TODO UNIQUE PER USER
            'color'  => 'sometimes|max:255',
            'enable' => 'sometimes|boolean|max:255',
        ]);

        $category = $user->categories()->findOrFail($id)->update($validated);

        return response()->json($user->categories()->findOrFail($id));
    }
    public function destroy($id)
    {
        $user = Auth::user();

        $category = $user->categories()->findOrFail($id)->delete();

        return response()->json($category);
    }
}
