<?php

namespace App\Http\Controllers;

use App\Models\PaymentTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InviteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function index()
    {
        return view('invite_user.index');
    }

    public function store(Request $request)
    {
        try {
            $plan=PaymentTransaction::where('user_id',Auth::user()->id)->first();
            $count=User::where('reference_id',Auth::user()->id)->count();
            // return 1;
           if(!is_null($plan)){

           
            if($plan->plan_id==1){
                
                $notification = array(
                    'Message' => 'Your are not eligble for this package. Please buy primium package',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
                
            } elseif($plan->plan_id==2){
                if($count<20){
                   
                    $request->validate([
                        'to' => 'required|email|string|max:255',
                        
                    ]);
        
                    $dpassword='$2y$10$XtqXJIsZm.PI2br/HOYUGulXSynjITm3LVjRGZ16dpef1hMNF3U3G'; //M8%8komoon
        
                    $iuser = new User();
                    $from = Auth::user()->email;
                    $user_id = Auth::user()->id;
                    $user_name = Auth::user()->username;
        
                    $iuser->reference_id = $user_id;
                    $iuser->username = $request->to;
                    $iuser->password = $dpassword;
                    $iuser->email = $request->to;
                    $iuser->save();
        
                    //Individual user sent feedback using mail
        
                    $contactName = $user_name;
                    $contactEmail = $from;
                    $contactEmailSend = $request->to;
                    $contactMessage = array("link"=>"http://localhost:8082/SmartVcard/login", "user_name"=>$request->to, "password"=>"M8%8komoon");
                    $contactSubject = 'Invitation from SmartVcard';
        
                    // return $contactMessage;
        
                    $data = array('name' => $contactName, 'email' => $contactEmail, 'comment' => $contactMessage);
                    Mail::send('Email.inviteEmail', $data, function ($message) use ($contactEmail, $contactName, $contactEmailSend, $contactSubject) {
                        $message->from($contactEmail, $contactName);
                        $message->to($contactEmailSend)->subject($contactSubject);
                    });
        
                    $notification = array(
                        'Message' => 'invitation successfully sent',
                        'alert-type' => 'success'
                    );
                    return back()->with($notification);
                }
                else{
                    
                    $notification = array(
                        'Message' => 'Your already sent 20 invitation',
                        'alert-type' => 'error'
                    );
                    return back()->with($notification);
                }
            }
            else{

                $request->validate([
                    'to' => 'required|email|string|max:255',
                    
                ]);
    
                $dpassword='$2y$10$XtqXJIsZm.PI2br/HOYUGulXSynjITm3LVjRGZ16dpef1hMNF3U3G'; //M8%8komoon
    
                $iuser = new User();
                $from = Auth::user()->email;
                $user_id = Auth::user()->id;
                $user_name = Auth::user()->username;
    
                $iuser->reference_id = $user_id;
                $iuser->username = $request->to;
                $iuser->password = $dpassword;
                $iuser->email = $request->to;
                $iuser->save();
    
                //Individual user sent feedback using mail
    
                $contactName = $user_name;
                $contactEmail = $from;
                $contactEmailSend = $request->to;
                $contactMessage = array("link"=>"http://localhost:8082/SmartVcard/login", "user_name"=>$request->to, "password"=>"M8%8komoon");
                $contactSubject = 'Invitation from SmartVcard';
    
                // return $contactMessage;
    
                $data = array('name' => $contactName, 'email' => $contactEmail, 'comment' => $contactMessage);
                Mail::send('Email.inviteEmail', $data, function ($message) use ($contactEmail, $contactName, $contactEmailSend, $contactSubject) {
                    $message->from($contactEmail, $contactName);
                    $message->to($contactEmailSend)->subject($contactSubject);
                });
    
                $notification = array(
                    'Message' => 'invitation successfully sent',
                    'alert-type' => 'success'
                );
                return back()->with($notification);
            }
        }else{
            $notification = array(
                'Message' =>'You do not have any plan subscribed',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
}
