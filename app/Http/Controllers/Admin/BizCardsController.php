<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SmartCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BizCardsController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
    
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $vCards=SmartCard::join('users as ur','vcards.user_id','ur.id')
                            ->select(
                                'vcards.*',
                                'ur.username',
                            )->get();
        return view('admin.vcards.index',compact('vCards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SmartCard::find($id)->delete();

        $notification = array(
            'Message' => 'Bizcard Deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function statusUpdate($id)
    {
        
        //return $id;
        $vCard=SmartCard::where('id',$id)->first();
      
       // return $vCard->status;
         if ($vCard->status == 1) {
             $data=array();
             $data['status']= 0;
             $blogs = SmartCard::find($id)->update($data);
         }else{
             $data=array();
             $data['status']= 1;
             $blogs = SmartCard::find($id)->update($data);
         }
 
         //response()->json(['success' => 'Comment status updated successfully']);
 
        $notification = array(
            'Message' => 'Bizcard status updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
