<?php

namespace App\Http\Controllers;

use App\Model\Chat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $messages = $this->user->chat;
        $currentUser = $this->user->load('channel');
        $userTwo = $currentUser->channel->where('channel_id', $currentUser->channel->channel_id)
            ->whereNotIn('user_id', [$currentUser->id])->with('user')->first();

        return view('home', compact('messages', 'currentUser', 'userTwo'));
    }
}
