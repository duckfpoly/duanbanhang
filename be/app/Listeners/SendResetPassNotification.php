<?php

namespace App\Listeners;

use App\Events\UserResetpassEvent;
use App\Notifications\UserResetpassNotificationMail;
use Illuminate\Support\Facades\Notification;

class SendResetPassNotification
{
    public function handle(UserResetpassEvent $event)
    {
        Notification::send($event->token, new UserResetpassNotificationMail($event->token));
    }
}
