<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;

class AdminResetPassword extends ResetPasswordNotification
{
    use Queueable;
    public $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->greeting('パスワードリセットのリクエスト承りました')
        ->subject('パスワード初期化についてのお知らせ')
        ->line('パスワードリセットのリンクを送信しました。')
        ->action('Notification Action', url('admin/reset-password', ['token' => $this->token]))
        ->line('このリンクは60分を過ぎると無効になります。')
        ->line('flower-giftをご利用くださってありがとうございます。')
        ->salutation('floewr-gift');
//         return (new MailMessage)
//         ->subject('パスワード初期化についてのお知らせ')
//         ->view('admin.reset-password', [
//             'restUrl' => route('admin.reset-password', ['token' => $this->token])
//    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
