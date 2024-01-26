<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $results = Product::select('objectID')->simplePaginate(1000);

        return response()->json($results);
    }
}
