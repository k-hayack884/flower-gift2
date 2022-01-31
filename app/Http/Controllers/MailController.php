<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PrimaryCategory;
use App\Models\SecondaryCategory;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Providers\AppServiceProvider;
use App\Http\Requests\UploadImageRequest;
use App\Http\Requests\ProductRequest;
use App\Services\MailService;
use App\Mail\trademail;
use Carbon\Carbon;
use InterventionImage;
use Illuminate\Validation\Rules\Password;

class MailController extends Controller
{
    public function create($id)
    {
        $mail=Comment::with('user')->findOrFail($id);
        $product=Comment::with('product')->findOrFail($id);
        return view('user.emails.create',compact('mail','product'));
    }
    public function send(Request $request,$id)
    {

        $toMail=User::findOrFail($request->user_id);
        $product=Product::findOrFail($request->product_id);
        
        Mail::to($toMail->email)->send(new Trademail($product,$toMail));

        return redirect()
            ->route('user.products.index')
            ->with([
                'message' => 'メールを送信しました',
                'status' => 'info'
            ]);
    }

}
