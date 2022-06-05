<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Model\Chat;
use Illuminate\Http\Request;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function sendMessage(Request $request, Chat $chat)
    {

        $chat->create($request->only($chat->getFillable()));
        $data = $chat::all()->toArray();

        event(new ChatEvent($data));
    }

    public function auth(Request $request, Pusher $pusher)
    {
        return $pusher->socket_auth($request->channel_name, $request->socket_id);
    }
}
