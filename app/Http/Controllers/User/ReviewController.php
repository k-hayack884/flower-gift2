<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function good(Request $request)
    {
        $good = Review::where('reviewer_id', Auth::id())
            ->first();
            dd($good);

        // if (empty($good)) {
        //     Favorite::create([
        //         'user_id' => Auth::id(),
        //         'product_id' => $request->product_id,

        //     ]);
        // }
        return redirect()->route('user.trades.show', ['trade' => $request->product_id]);
    }
}
