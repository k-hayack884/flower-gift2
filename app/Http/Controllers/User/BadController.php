<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BadProduct;
use App\Models\BadComment;
use App\Models\Product;
use App\Models\Comment;
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
use Illuminate\Validation\Rules\Password;
class BadController extends Controller
{
    public function product($id)
    {
        $badProduct=Product::findOrFail($id);
        return view('user.bads.product',compact('badProduct'));
    }
    public function comment($id)
    {
        $badComment=Comment::with('user')->findOrFail($id);
        return view('user.bads.comment',compact('badComment'));
    }
    public function commentSend(Request $request,$id)
    {
        $request->validate([
            'reason' => ['string', 'max:100'],
        ]);

            BadComment::create([
            'user_id'=>Auth::id(),
            'comment_id' => $id,
            'reason' => $request->reason,
            'status' => true,
        ]);
        return redirect()
        ->route('user.dashboard')
        ->with(['message'=>'違反コメントを報告しました',
        'status'=> 'info']);
    }
    public function productSend(Request $request,$id)
    {
        $request->validate([
            'reason' => [ 'string', 'max:100'],
        ]);
        BadProduct::create([
            'user_id'=>Auth::id(),
            'product_id' => $id,
            'reason' => $request->reason,
            'status' => true,
        ]);
        return redirect()
        ->route('user.dashboard')
        ->with(['message'=>'違反商品を報告しました',
        'status'=> 'info']);
    }

}
