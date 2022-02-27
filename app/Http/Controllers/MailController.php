<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Mail;
use App\Mail\trademail;
use App\Mail\Ownermail;
use SendGrid;
use SendGrid\Mail\Mail;
use \Symfony\Component\HttpFoundation\Response;

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

        $email = new Mail();
        $email->setFrom('flowergift884@gmail.com', 'flower-gift運営');
        $email->setSubject('取引ありがとうございます');
        $email->addTo($user->email);
        $email->addContent("text/html",  strval(
            view(
                'emails.mail',
                compact('user', 'product', 'request')
            )
        ));

        $sendgrid = new SendGrid(env('SENDGRID_API_KEY'));


        $ownerEmail = new Mail();
        $ownerEmail->setFrom('flowergift884@gmail.com', 'flower-gift運営');
        $ownerEmail->setSubject('取引ありがとうございます');
        $ownerEmail->addTo('hayack.job@gmail.com');
        $ownerEmail->addContent("text/html",  strval(
            view(
                'emails.ownermail',
                compact('user', 'product', 'request')
            )
        ));
        try {
            $sendgrid->send($email);
            $sendgrid->send($ownerEmail);
            return redirect()
                ->route('user.trades.show', ['trade' => $request->product_id])
                ->with([
                    'message' => 'メールを送信しました',
                    'status' => 'info'
                ]);
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            return '送信に失敗しました';
        }

        // Mail::to($user->email)->send(new Trademail($product, $user, $request));
        // Mail::to($product->user->email)->send(new OwnerMail($product, $user, $request));

    }
}
