<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use App\Models\Quote;
use Illuminate\Http\Request;

class PolicyController extends Controller
{

public function index()
{
    $policies = Policy::with(['product','quote'])->get();

    return response()->json([
        'success' => true,
        'data' => $policies
    ]);
}
    public function store(Request $request)
    {
        $request->validate([
            'quote_id' => 'required|exists:quotes,id'
        ]);

        $quote = Quote::findOrFail($request->quote_id);

        // Generate Policy Number
        $policyNumber = 'POL-' . date('Ymd') . '-' . rand(1000,9999);

        $policy = Policy::create([
            'user_id' => $quote->user_id,
            'quote_id' => $quote->id,
            'insurance_product_id' => $quote->insurance_product_id,
            'policy_number' => $policyNumber,
            'effective_date' => now()
        ]);

        // Update Quote Status
        $quote->update([
            'status' => 'accepted'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Policy created successfully',
            'data' => $policy
        ]);
    }
}
