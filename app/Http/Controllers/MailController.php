<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\trademail;
use App\Mail\Ownermail;

class MailController extends Controller
{
    public function create($id)
    {
        $user = Auth::id();
        $product = Product::with('user')->findOrFail($id);
        return view('user.emails.create', compact('user', 'product'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => ['string', 'max:20', 'required'],
            'message' => ['string', 'max:200', 'required'],
        ]);
        $user = User::findOrFail(Auth::id());

        $product = Product::with('user')->findOrFail($request->product_id);

        Mail::to($user->email)->send(new Trademail($product, $user, $request));
        Mail::to($product->user->email)->send(new OwnerMail($product, $user, $request));

        return redirect()
            ->route('user.trades.show', ['trade' => $request->product_id])
            ->with([
                'message' => 'メールを送信しました',
                'status' => 'info'
            ]);
    }
}
