<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InsuranceProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = InsuranceProduct::all();

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }
}
