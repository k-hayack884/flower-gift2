<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\BadProduct;
use App\Models\BadComment;
use App\Models\ProcessedComment;
use App\Models\ProcessedProduct;
use App\Models\Product;
use App\Models\Comment;
use App\Models\User;

class BadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function badCommentIndex()
    {
        $comments=BadComment::with('comment')->with('user')->paginate(10);

        return view('admin.bads.comment-index', compact('comments'));
    }
    public function badCommentDelete($id)
    {
        try {
            DB::transaction(function () use ($id) {
                BadComment::select('id')
                ->where('comment_id', $id)->delete();
                
                ProcessedComment::create([
                    'admin_id' => Auth::id(),
                    'result' => false,
        
                ]);
            }, 2); //試行する回数
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        

        return view('admin.bads.comment-index', compact('comments'));
    }
    public function badCommentCancel($id)
    {
dd('媚王ウル');
        $comments=BadComment::with('comment')->with('user')->paginate(10);

        return view('admin.bads.comment-index', compact('comments'));
    }

    public function badProductIndex()
    {
        $products=BadProduct::with('product')->paginate(10);
        return view('admin.bads.comment-index', compact('products'));
    }
}
