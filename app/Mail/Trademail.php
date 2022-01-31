<?php

namespace App\Mail;

use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class Trademail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $product;
    public $toMail;
    public function __construct(Product $product,$toMail)
    {
        $this->product = $product;
        $this->toMail = $toMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('取引を開始します')->view('emails.mail');
    }
}
