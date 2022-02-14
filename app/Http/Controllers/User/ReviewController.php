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
        $reviewer_id = Auth::id();
        $reviewee_id = $request->input('userid');
        // dd($reviewer_id,$reviewee_id);
        $reviewCheck = Review::where('reviewer_id', $reviewer_id)
                ->where('reviewee_id', $reviewee_id)->first();

            if (empty($reviewCheck)) {
                Review::create([
                    'reviewee_id' =>  $reviewee_id,
                    'reviewer_id' => $reviewer_id,
                    'review'=>1
    
                ]);
        $good=Review::goodReview($reviewee_id);
        $normal=Review::normalReview($reviewee_id);
        $bad=Review::badReview($reviewee_id);

                return response()->json([
                    'message' => 'お気に入り登録に成功しました',
                    'good'=>$good,
                    'normal'=>$normal,
                    'bad'=>$bad
                ]); //200が入ってる
            }else{
                return response()->json([
                    'message' => 'すでにそのユーザーを評価しています'
                ],403);
        
            } 
        //リクエストしている人のid 評価されようとしている人
        //2回目の評価は４０３をかえす　必須　フロントとバック両方守る
        # code... スコープを呼び出す　全部いる　
        return response()->json([
            'message' => 'レビューありがとうございます!'
        ]); //200が入ってる

    }
    public function normal(Request $request)
    {
        $reviewer_id = Auth::id();
        $reviewee_id = $request->input('userid');
        $reviewCheck = Review::where('reviewer_id', $reviewer_id)
                ->where('reviewee_id', $reviewee_id)->first();

            if (empty($reviewCheck)) {
                Review::create([
                    'reviewee_id' =>  $reviewee_id,
                    'reviewer_id' => $reviewer_id,
                    'review'=>2
    
                ]);
        $good=Review::goodReview($reviewee_id);
        $normal=Review::normalReview($reviewee_id);
        $bad=Review::badReview($reviewee_id);

                return response()->json([
                    'message' => 'お気に入り登録に成功しました',
                    'good'=>$good,
                    'normal'=>$normal,
                    'bad'=>$bad
                ]); //200が入ってる
            }else{
                return response()->json([
                    'message' => 'すでにそのユーザーを評価しています'
                ],403);
        
            } 
        //リクエストしている人のid 評価されようとしている人
        //2回目の評価は４０３をかえす　必須　フロントとバック両方守る
        # code... スコープを呼び出す　全部いる　
        return response()->json([
            'message' => 'レビューありがとうございます!'
        ]); //200が入ってる
    }
    public function bad(Request $request)
    {
        $reviewer_id = Auth::id();
        $reviewee_id = $request->input('userid');
        $reviewCheck = Review::where('reviewer_id', $reviewer_id)
                ->where('reviewee_id', $reviewee_id)->first();

            if (empty($reviewCheck)) {
                Review::create([
                    'reviewee_id' =>  $reviewee_id,
                    'reviewer_id' => $reviewer_id,
                    'review'=>3
    
                ]);
        $good=Review::goodReview($reviewee_id);
        $normal=Review::normalReview($reviewee_id);
        $bad=Review::badReview($reviewee_id);

                return response()->json([
                    'message' => 'お気に入り登録に成功しました',
                    'good'=>$good,
                    'normal'=>$normal,
                    'bad'=>$bad
                ]); //200が入ってる
            }else{
                return response()->json([
                    'message' => 'すでにそのユーザーを評価しています'
                ],403);
        
            } 
        //リクエストしている人のid 評価されようとしている人
        //2回目の評価は４０３をかえす　必須　フロントとバック両方守る
        # code... スコープを呼び出す　全部いる　
        return response()->json([
            'message' => 'レビューありがとうございます!'
        ]); //200が入ってる
    }
}

