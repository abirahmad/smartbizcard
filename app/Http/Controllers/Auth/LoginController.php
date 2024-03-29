<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $inputVal = $request->all();
   
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);  
        if(auth()->attempt(array('username' => $inputVal['username'], 'password' => $inputVal['password']))){
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.home');
            }else{

                if(Session::has('payment_route')){
                    $plan_id = Session::get('payment_route');
                    return redirect()->route('payment-invoice',$plan_id);
                }elseif(Session::has('share_route')){
                    $reference = Session::get('share_route');
                    return redirect()->route('share.contact',$reference);
                }else{
                    return redirect()->route('home');
                }
                
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email & Password are incorrect.');
        }     
    }
}
