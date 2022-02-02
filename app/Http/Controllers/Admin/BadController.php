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
                
                $comments=Comment::findOrFail($id);
                $comments->status=0;
                $comments->save();
                ProcessedComment::create([
                    'admin_id' => Auth::id(),
                    'result' => false,
        
                ]);
            }, 2); //試行する回数
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        

        return redirect()->route('admin.bad.comment-index');
    }
    public function badCommentCancel($id)
    {
        try {
            DB::transaction(function () use ($id) {
                BadComment::select('id')
                ->where('comment_id', $id)->delete();
                
                ProcessedComment::create([
                    'admin_id' => Auth::id(),
                    'result' => true,
        
                ]);
            }, 2); //試行する回数
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        

        return redirect()->route('admin.bad.comment-index');
    }

    public function badProductIndex()
    {
        $products=BadProduct::with('product')->paginate(10);
        return view('admin.bads.product-index', compact('products'));
    }
    public function badProductShow($id)
    {
        $product=BadProduct::with('product')->findOrFail($id);
        return view('admin.bads.product-show', compact('product'));
    }
    public function badProductDelete($id)
    {
        try {
            DB::transaction(function () use ($id) {
                BadProduct::select('id')
                ->where('product_id', $id)->delete();
                
                $product=Product::findOrFail($id);
                $product->status=0;
                $product->save();

                ProcessedProduct::create([
                    'admin_id' => Auth::id(),
                    'result' => false,
        
                ]);
            }, 2); //試行する回数
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        

        return redirect()->route('admin.bads.product-index');
    }
    public function badProductCancel($id)
    {
        try {
            DB::transaction(function () use ($id) {
                BadProduct::select('id')
                ->where('product_id', $id)->delete();
                

                ProcessedProduct::create([
                    'admin_id' => Auth::id(),
                    'result' => true,
        
                ]);
            }, 2); //試行する回数
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        

        return redirect()->route('admin.bads.product-index');
    }
}
