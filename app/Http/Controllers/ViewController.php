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

$productInfo =Product::availableItems()
->sortOrder($request->sort)
->paginate(20); //ローカルスコープ


        return view('user.welcome', compact('productInfo'));
    }
}
