<?php

namespace App\Mail;

use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class Trademail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $product;
    public $user;
    public $request;
    public function __construct(Product $product, $user, $request)
    {
        $this->product = $product;
        $this->user = $user;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('取引ありがとうございます')->view('emails.mail');
    }
}
