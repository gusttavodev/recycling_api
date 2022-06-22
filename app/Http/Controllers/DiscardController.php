<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return response()->json($user->discard()->with('product')->get());
    }
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'quantity'   => 'required|number|min:1|max:5000',
            'date'       => 'required',
            'product_id' => 'required' # Required existent product
        ]);

        $discard = $user->discard()->create($validated);

        return $discard;
    }
    public function show($id)
    {
        $user = Auth::user();

        return response()->json($user->discard()->with('product')->find($id));
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        $user = Auth::user();

        $discard = $user->discard()->findOrFail($id)->delete();

        return response()->json($discard);
    }
}
