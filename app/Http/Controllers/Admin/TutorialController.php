<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutorial;
use Auth;

class TutorialController extends Controller
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
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $tutorials = Tutorial::orderBy('id', 'desc')->get();
        return view('admin.tutorial.index', compact('tutorials'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        
        $request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);

        $tutorial = new Tutorial();

        $user = Auth::user()->id;

        $tutorial->user_id = $user;
        $tutorial->title = $request->title;
        $tutorial->link = $request->link;
        $tutorial->save();

        $notification = array(
            'Message' => 'Tutorial has been added successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }
}
