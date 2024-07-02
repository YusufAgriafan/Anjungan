<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\YourEventName;

class PusherTestController extends Controller
{
    public function sendEvent()
    {
        $data = ['message' => 'Hello, Pusher!'];
        event(new YourEventName($data));
        return 'Event has been sent!';
    }
}
