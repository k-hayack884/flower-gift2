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
use App\Services\ImageService;
use Carbon\Carbon;
use InterventionImage;

class FavoriteController extends Controller
{
    public function add(Request $request)
    {
        $itemInFavorite=Favorite::where('user_id', Auth::id())
        ->where('product_id', $request->product_id)->first();
        
        if (!$itemInFavorite) {
            Favorite::create([
                'user_id'=>Auth::id(),
                'product_id'=>$request->product_id,
                
                ]);
        }
        return redirect()->route('user.trades.show', ['trade' => $request->product_id]);
    }
    public function delete(Request $request)
    {
        Favorite::where('product_id', $request->product_id)
        ->where('user_id', Auth::id())->delete();
        
        return redirect()->route('user.trades.show', ['trade' => $request->product_id]);
    }
}
