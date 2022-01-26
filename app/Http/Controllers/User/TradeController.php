<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PrimaryCategory;
use App\Models\SecondaryCategory;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Providers\AppServiceProvider;
use App\Http\Requests\UploadImageRequest;
use App\Http\Requests\ProductRequest;
use App\Services\ImageService;
use Carbon\Carbon;
use InterventionImage;

class TradeController extends Controller
{
    public function show($id)
    {
        //大カテゴリーと小カテゴリーの名称を取得
        $categoryName= Product::findOrFail($id)
        ->join('secondary_categories', 'products.secondary_category_id', '=', 'secondary_categories.id')
            ->join('primary_categories', 'secondary_categories.primary_category_id', '=', 'primary_categories.id')
            ->select('products.id', 'secondary_categories.name AS secondary_name', 'primary_categories.name AS primary_name')
            ->where('products.id', $id)
            ->first();
        
        $productInfo = Product::findOrFail($id);
        $userProfile=Product::with('user')->findOrFail($id);

        return view('user.trades.show', compact('userProfile', 'productInfo', 'categoryName'));
    }
}
