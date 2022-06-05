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
        $currentUser = $this->user;

        return view('home', compact('messages','currentUser'));
    }
}
