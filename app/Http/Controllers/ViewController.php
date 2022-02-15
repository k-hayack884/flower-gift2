<?php

namespace App\Http\Controllers;

use App\Models\PrimaryCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(Request $request)
    {
        $categories=PrimaryCategory::with('secondary')->get();
        $productInfo=Product::availableItems()
        ->selectCategory($request->category ?? '0')
        ->searchKeyword($request->keyword ?? '')
        ->sortOrder($request->sort)->with('category')->paginate(20); //n+1なんとかなた
        return view('welcome', compact('productInfo', 'categories'));
    }
}
