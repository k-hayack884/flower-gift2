<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PrimaryCategory;
use App\Models\SecondaryCategory;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $categories=PrimaryCategory::with('secondary')->get();
        $productInfo=Product::availableItems()
        ->selectCategory($request->category ?? '0')
        ->searchKeyword($request->keyword ?? '')
        ->sortOrder($request->sort)->with('category')->paginate(20); //n+1なんとかなた
        
        // dd($category, $keyword, $sort);
        return view('user.welcome', compact('productInfo', 'categories'));
    }
}
