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

class BadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function badCommentIndex()
    {
        $comments=BadComment::with('comment')->with('user')->paginate(10);
foreach($comments as $comment){
}
        return view('admin.bads.comment-index', compact('comments'));
    }
    public function badCommentDelete(Request $request,$id)
    {
        try {
            DB::transaction(function () use ($id,$request) {
                BadComment::select('id')
                ->where('id', $id)->delete();
                
                $comments=Comment::findOrFail($id);
                $comments->status=0;
                $comments->save();
                ProcessedComment::create([
                    'admin_id' => Auth::id(),
                    'result' => false,
                    'comment_id'=> $request->comment_id
        
                ]);
            }, 2); //試行する回数
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        

        return redirect()->route('admin.bads.comment-index')
        ->with(['message'=>'違反コメントを凍結しました',
        'status'=> 'delete']);;
    }
    public function badCommentCancel(Request $request,$id)
    {
        try {
            DB::transaction(function () use ($request,$id) {
                BadComment::select('id')
                ->where('id', $id)->delete();
                
                ProcessedComment::create([
                    'admin_id' => Auth::id(),
                    'result' => true,
                    'comment_id'=> $request->comment_id
        
                ]);
            }, 2); //試行する回数
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        

        return redirect()->route('admin.bads.comment-index')
        ->with(['message'=>'違反コメントを取消しました',
        'status'=> 'info']);;
    }

    public function badProductIndex()
    {
        $products=BadProduct::with('product.user')->paginate(10);
        return view('admin.bads.product-index', compact('products'));
    }
    public function badProductShow($id)
    {
        $product=BadProduct::with('product')->findOrFail($id);
        return view('admin.bads.product-show', compact('product'));
    }
    public function badProductDelete(Request $request,$id)
    {

        try {
            DB::transaction(function () use ($request,$id) {
                BadProduct::select('id')
                ->where('id', $id)->delete();
                
                $product=Product::findOrFail($id);
                $product->status=0;
                $product->save();

                ProcessedProduct::create([
                    'admin_id' => Auth::id(),
                    'result' => false,
                    'product_id'=>$request->product_id
        
                ]);
            }, 2); //試行する回数
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        

        return redirect()->route('admin.bads.product-index')
        ->with(['message'=>'違反商品をを凍結しました',
        'status'=> 'delete']);;
    }
    public function badProductCancel(Request $request,$id)
    {
        try {
            DB::transaction(function () use ($request,$id) {
                BadProduct::select('id')
                ->where('id', $id)->delete();
                

                ProcessedProduct::create([
                    'admin_id' => Auth::id(),
                    'result' => true,
                    'product_id'=>$request->product_id
        
                ]);
            }, 2); //試行する回数
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        

        return redirect()->route('admin.bads.product-index')
        ->with(['message'=>'違反商品を取り消しました',
        'status'=> 'info']);;
    }
}
