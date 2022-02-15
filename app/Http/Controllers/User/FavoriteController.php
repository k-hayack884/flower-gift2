<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

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
        } else {
            return response()->json([
                'message' => 'お気に入り登録済みです'
            ], 403);
        }
    }

    public function delete(Request $request)
    {
        $product_id = $request->input('productId');
        Favorite::where('product_id', $product_id)
            ->where('user_id', Auth::id())->delete();
        return response()->json([
            'message' => 'お気に入り登録を削除しました'
        ]); //200が入ってる
    }
}
