<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class SetSessionController extends Controller
{
    public function store(Request $request)
    {
        Session::put('payment_route', $request->p_id);
        return redirect()->route('login');
    }

    public function setShareRoute(Request $request)
    {
        Session::put('share_route', $request->reference);
        return redirect()->route('login');
    }
}
