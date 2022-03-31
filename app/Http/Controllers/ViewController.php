<?php

namespace App\Http\Controllers;

use App\Models\PrimaryCategory;
use App\Models\Product;
use App\Models\Review;
use App\Models\Comment;
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
    public function show($id)
    {
        $productInfo = Product::findOrFail($id);
        if ($productInfo->status === 0) {
            return redirect()
                ->route('welocme')
                ->with([
                    'message' => 'この商品は非公開にされています',
                    'status' => 'bad'
                ]);
        }
        //大カテゴリーと小カテゴリーの名称を取得
        $categoryName = Product::findOrFail($id)
            ->join('secondary_categories', 'products.secondary_category_id', '=', 'secondary_categories.id')
            ->join('primary_categories', 'secondary_categories.primary_category_id', '=', 'primary_categories.id')
            ->select('products.id', 'secondary_categories.name AS secondary_name', 'primary_categories.name AS primary_name')
            ->where('products.id', $id)
            ->first();

        $userProfile = Product::with('user')->findOrFail($id);


        $good = Review::goodReview($userProfile->user_id);
        $normal = Review::normalReview($userProfile->user_id);
        $bad = Review::badReview($userProfile->user_id);
        $comments = Comment::with('user')->where('product_id', $id)->get();
        return view('show', compact('userProfile', 'productInfo', 'categoryName', 'comments', 'good', 'normal', 'bad'));
    }

}
