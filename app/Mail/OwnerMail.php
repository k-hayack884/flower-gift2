<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use SendGrid;
use SendGrid\Mail\Mail;




class OwnerMail extends Mailable
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
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("flowergift884@gmail.com", "Example User");
        $email->setSubject("Sending with Twilio SendGrid is Fun");
        $email->addTo("hayack885@gmail.com", "unchi");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
        return $this->subject('取引ありがとうございます')->view('emails.ownermail');
    }
}
