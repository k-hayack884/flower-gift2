<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\AppServiceProvider;

class FavoriteController extends Controller
{
    public function index()
    {
        $favoriteItem = Favorite::with('product') //モデルのリレーションのファンクションでつなぐ
            ->where('user_id', Auth::id())->get();
           


        return view('user.favorites.index', compact('favoriteItem'));
    }
    public function add(Request $request)
    {
    $product_id = $request->input('productId');

        $itemInFavorite = Favorite::where('user_id', Auth::id())
            ->where('product_id', $product_id)->first();
            //可能なら４０３を返す
        if (empty($itemInFavorite)) {
            Favorite::create([
                'user_id' => Auth::id(),
                'product_id' => $product_id,

            ]);
            return response()->json([
                'message' => 'お気に入り登録に成功しました'
            ]); //200が入ってる
        }else{
            return response()->json([
                'message' => 'お気に入り登録済みです'
            ],403);
    
        } 

        // return response()->json([Favorite::all()]);
        // return redirect()->route('user.trades.show', ['trade' => $request->product_id]);
    }
    public function delete(Request $request)
    {
        $product_id = $request->input('productId');
        Favorite::where('product_id', $product_id)
            ->where('user_id', Auth::id())->delete();
            return response()->json([
                'message' => 'お気に入り登録を削除しました'
            ]); //200が入ってる
        // return redirect()->route('user.trades.show', ['trade' => $request->product_id]);
    }
    // public function indexDelete(Request $request)
    // {
    //     $product_id = $request->input('productId');
    //     Favorite::where('product_id', $product_id)
    //         ->where('user_id', Auth::id())->delete();

    //         return response()->json([
    //             'message' => 'お気に入り登録を削除しました'
    //         ]); //200が入ってる
    // }
}
