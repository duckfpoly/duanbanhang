<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserResetpassNotificationMail extends Notification implements ShouldQueue
{
    use Queueable;
    protected $token;
    public function __construct($token)
    {
        $this->token = $token;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        $url = url('reset-password/' . $this->token);
        return (new MailMessage)
            ->line('Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn. Dưới đây là mã để đặt lại mật khẩu của bạn, vui lòng không tiết lộ mã này !')
            ->line('Mã đặt lại mật khẩu của bạn là: '.$this->token)
//            ->action('Reset Password', url($url))
            ->line('Nếu không phải bạn yêu cầu, vui lòng liện hệ lại với chúng tôi qua email này !');
    }
}
