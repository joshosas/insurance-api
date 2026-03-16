<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InsuranceProduct;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{

public function index()
{
    $quotes =  Quote::with('product')->get();

    return response()->json([
        'success' => true,
        'data' => $quotes
    ]);

}
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'insurance_product_id' => 'required|exists:insurance_products,id'
            ]);

            $product = InsuranceProduct::findOrFail($request->insurance_product_id);

            $premium = $product->base_price * 1.15;

            $quote = Quote::create([
                'user_id' => $request->user_id,
                'insurance_product_id' => $request->insurance_product_id,
                'estimated_premium' => $premium,
                'status' => 'pending'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Quote generated successfully',
                'data' => $quote
            ]);
    }
}
