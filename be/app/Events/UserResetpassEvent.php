<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserResetpassEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }
}
