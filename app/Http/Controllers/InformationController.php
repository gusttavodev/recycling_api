<?php

namespace App\Http\Controllers;

use App\Models\Discard;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function productDiscardMonth(Request $request)
    {
        $user  = auth()->user();

        $discard = Discard::select(
            'products.id as product_id', 'products.name as product_name'
        )
        ->selectRaw("SUM(discards.quantity) as total_discard_quantity")
        ->groupBy('products.id')
        ->where('discards.user_id', $user->id)
        ->join('products', 'discards.product_id', '=', 'products.id');

        return response()->json($discard->get());
    }
}
