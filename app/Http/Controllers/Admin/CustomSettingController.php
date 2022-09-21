<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomSetting;
use Illuminate\Support\Facades\Auth;

class CustomSettingController extends Controller
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
    
    public function index()
    {
        
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $items = CustomSetting::all();
        return view('admin.membership.custom.index', compact('items'));
    }

    public function store(Request $request)
    {
        
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'title' => 'required|max:255',
            'status' => 'required',
        ]);

        $item = new CustomSetting;
        $item->title = $request->title;
        $item->status = $request->status;

        $item->save();

        $notification = array(
            'Message' => 'Custom Setting Created successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function edit($id)
    {
        
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $setting_details = CustomSetting::Find($id);
        return view('admin.membership.custom.edit', compact('setting_details'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'status' => 'required',
        ]);

        $update_custom_settings = CustomSetting::Find($id);
        $update_custom_settings->title = $request->title;
        $update_custom_settings->status = $request->status;
        $update_custom_settings->update();

        $notification = array(
            'Message' => 'Custom Setting updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.custom-settings.index')->with($notification);
    }

    public function destroy($id)
    {
        
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $destroy = CustomSetting::Find($id);
        $destroy->delete();
        $notification = array(
            'Message' => 'Item remove from list successfully!',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }
    
}
