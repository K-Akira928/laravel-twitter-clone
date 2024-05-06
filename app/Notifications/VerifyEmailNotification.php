<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;

class VerifyEmailNotification extends VerifyEmail
{
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return (new MailMessage)
            ->subject('メールアドレスの確認')
            ->line('以下のボタンをクリックして、メールアドレスの確認を行ってください。')
            ->action('メールアドレスの確認', $verificationUrl)
            ->line('もし心当たりがなければ、メールを破棄してください。');
    }
}
