<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
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

class ReviewController extends Controller
{
    public function good(Request $request) //
    {
        //リクエストしている人のid 評価されようとしている人
        //2回目の評価は４０３をかえす　必須　フロントとバック両方守る
        # code... スコープを呼び出す　全部いる　
        return response()->json([
            'message' => 'レビューありがとうございます!'
        ]); //200が入ってる

    }
    public function normal(Request $request)
    {
        return response()->json([
            'message' => 'レビューありがとうございます!'
        ]);
    }
    public function bad(Request $request)
    {
        return response()->json([
            'message' => 'レビューありがとうございます!'
        ]);
    }

}
