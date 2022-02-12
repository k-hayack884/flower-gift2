<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Favorite;
use App\Models\Review;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class TradeController extends Controller
{
    public function show($id)
    {
        $productInfo = Product::findOrFail($id);
        if($productInfo->status===0){
            return redirect()
            ->route('user.dashboard')
            ->with([
                'message' => 'この商品は非公開にされています',
                'status' => 'info'
            ]);
        }
        //大カテゴリーと小カテゴリーの名称を取得
        $categoryName = Product::findOrFail($id)
            ->join('secondary_categories', 'products.secondary_category_id', '=', 'secondary_categories.id')
            ->join('primary_categories', 'secondary_categories.primary_category_id', '=', 'primary_categories.id')
            ->select('products.id', 'secondary_categories.name AS secondary_name', 'primary_categories.name AS primary_name')
            ->where('products.id', $id)
            ->first();
        // $favorite=Favorite::with('user')->findOrFail($id);
        $userProfile = Product::with('user')->findOrFail($id);
        $favorite = Favorite::where('product_id', $id)
            ->where('user_id', Auth::id())->first();
        $good = Review::goodReview($userProfile->user_id);
        $normal = Review::normalReview($userProfile->user_id);
        $bad = Review::badReview($userProfile->user_id);
        $comments = Comment::with('user')->where('product_id', $id)->get();
        return view('user.trades.show', compact('userProfile', 'productInfo', 'categoryName', 'favorite', 'comments', 'good', 'normal', 'bad'));
    }
    public function add(Request $request)
    {
        $request->validate([
            'comment' => ['string', 'max:100'],
            'status' => ['boolean'],
        ]);


        Comment::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'comment' => $request->comment,
            'status' => true
        ]);
        return redirect()->route('user.trades.show', ['trade' => $request->product_id])
        ->with(['message'=>'コメントを投稿しました',
        'status'=> 'info']);;
    }
    public function delete(Request $request, $id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->route('user.trades.show', ['trade' => $request->product_id])
        ->with(['message'=>'コメントを削除しました',
        'status'=> 'info']);;
    }

}
