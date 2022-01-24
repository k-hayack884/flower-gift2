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
    public function index()
    {
        $productInfo=Product::with('category')
        ->paginate(20);
        return view('user.welcome', compact('productInfo'));
    }
}
