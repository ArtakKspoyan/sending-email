<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MessageFormRequest;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('message');
    }

    public function send(MessageFormRequest $request)
    {
        Auth::user()->message()->create([
            'message' => $request->message,
        ]);
        $email = Auth::user()->email;
        $name = Auth::user()->name;

        $data = array(
            'name' => $name,
            'message' => $request->message
        );

        Mail::to($email)->send(new SendEmail($data));
        return redirect()->back()
            ->with('success', 'Message sending successfully!');
    }

}
