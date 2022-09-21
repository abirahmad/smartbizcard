<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedBack;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

use Auth;

class FeedBackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    /**
     * feedback
     */
    public function index()
    {
        return view('feedback.index');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'to' => 'required|email|string|max:255',
                'subject' => 'nullable',
                'description' => 'required',
            ]);

            $feedback = new FeedBack();
            $from = Auth::user()->email;
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->username;
            $feedback->user_id = $user_id;
            $feedback->from = $from;
            $feedback->to = $request->to;
            $feedback->subject = $request->subject;
            $feedback->description = $request->description;

            $feedback->save();

            //Individual user sent feedback using mail

            $contactName = $user_name;
            $contactEmail = $from;
            $contactEmailSend = $request->to;
            $contactMessage = $request->description;
            $contactSubject = $request->subject;

            $data = array('name' => $contactName, 'email' => $contactEmail, 'comment' => $contactMessage);
            Mail::send('Email.feedback', $data, function ($message) use ($contactEmail, $contactName, $contactEmailSend, $contactSubject) {
                $message->from($contactEmail, $contactName);
                $message->to($contactEmailSend)->subject($contactSubject);
            });

            $notification = array(
                'Message' => 'Feedback successfully sent',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
}
