<?php

namespace App\Mail;

use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use SendGrid;
use SendGrid\Mail\Mail;
use \Symfony\Component\HttpFoundation\Response;

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
        $email = new Mail();
        $email->setFrom('hayack885@gmail.com', 'ララベルメールテストチーム');
        $email->setSubject('取引ありがとうございます');
        $email->addTo('hayack885@gmail.com');
        $email->addContent("text/plain", 'えのっぴ');

        $sendgrid = new SendGrid(env('SENDGRID_API_KEY'));

        $response = $sendgrid->send($email);
        if ($response->statusCode() == Response::HTTP_ACCEPTED) {
            return $this->subject('取引ありがとうございます')->view('emails.mail');
        } else {
            return view('mail', ['errorMessage' => '送信失敗しました!']);
        }

        return $this->subject('取引ありがとうございます')->view('emails.mail');
    }
}
