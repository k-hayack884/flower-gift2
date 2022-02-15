<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function good(Request $request) //
    {
        $reviewer_id = Auth::id();
        $reviewee_id = $request->input('userid');
        $reviewCheck = Review::where('reviewer_id', $reviewer_id)
            ->where('reviewee_id', $reviewee_id)->first();

        if (empty($reviewCheck)) {
            Review::create([
                'reviewee_id' =>  $reviewee_id,
                'reviewer_id' => $reviewer_id,
                'review' => 1
            ]);
            $good = Review::goodReview($reviewee_id);
            $normal = Review::normalReview($reviewee_id);
            $bad = Review::badReview($reviewee_id);

            return response()->json([
                'message' => 'お気に入り登録に成功しました',
                'good' => $good,
                'normal' => $normal,
                'bad' => $bad
            ]); //200が入ってる
        } else {
            return response()->json([
                'message' => 'すでにそのユーザーを評価しています'
            ], 403);
        }
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
                'review' => 2
            ]);
            $good = Review::goodReview($reviewee_id);
            $normal = Review::normalReview($reviewee_id);
            $bad = Review::badReview($reviewee_id);

            return response()->json([
                'message' => 'お気に入り登録に成功しました',
                'good' => $good,
                'normal' => $normal,
                'bad' => $bad
            ]); //200が入ってる
        } else {
            return response()->json([
                'message' => 'すでにそのユーザーを評価しています'
            ], 403);
        }
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
                'review' => 3
            ]);
            $good = Review::goodReview($reviewee_id);
            $normal = Review::normalReview($reviewee_id);
            $bad = Review::badReview($reviewee_id);

            return response()->json([
                'message' => 'お気に入り登録に成功しました',
                'good' => $good,
                'normal' => $normal,
                'bad' => $bad
            ]); //200が入ってる
        } else {
            return response()->json([
                'message' => 'すでにそのユーザーを評価しています'
            ], 403);
        }
        return response()->json([
            'message' => 'レビューありがとうございます!'
        ]); //200が入ってる
    }
}
