<?php

namespace App\Http\Controllers;

use App\Models\LogoCopyrightSettings;
use App\Models\LogoNCopyRight;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class SettingsController extends Controller
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

    public function logoCopyRight(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        Session::put('page', 'logoCopyRight');
        $user = Auth::user();
        $data = LogoCopyrightSettings::where('user_id', $user->id)->first();
        // $data = LogoNCopyRight::get();
        return view('settings.logo_copyright', compact('data'));
    }

    public function updateLogoCopyRIght($id, Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        try {
            $user = Auth::user();
            $logo = LogoCopyrightSettings::where('user_id', $user->id)->first();
            if ($request->isMethod('post')) {
                $data = $request->all();
                $logo->copyright = $data['copyright'];
                //header logo
                if ($request->hasFile('header_logo')) {
                    $headerLogo = public_path('backend/images/logos/' . $logo['header_logo']);
                    if (File::exists($headerLogo)) {
                        unlink($headerLogo);
                    }
                    $image_tmp = $request->file('header_logo');
                    if ($image_tmp->isValid()) {
                        $image_name = $image_tmp->getClientOriginalName();
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = $image_name . '-' . rand(111, 99999) . '.' . $extension;
                        $logo_image_path = public_path('backend/images/logos/' . $imageName);
                        Image::make($image_tmp)->resize(494, 82)->save($logo_image_path);
                        $logo->header_logo = $imageName;
                    }
                }
                //footer logo
                if ($request->hasFile('footer_logo')) {
                    $footerLogo = public_path('backend/images/logos/' . $logo['footer_logo']);
                    if (FIle::exists($footerLogo)) {
                        unlink($footerLogo);
                    }
                    $image_tmp = $request->file('footer_logo');
                    if ($image_tmp->isValid()) {
                        $image_name = $image_tmp->getClientOriginalName();
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = $image_name . '-' . rand(111, 99999) . '.' . $extension;
                        $logo_image_path = public_path('backend/images/logos/' . $imageName);
                        Image::make($image_tmp)->resize(494, 82)->save($logo_image_path);
                        $logo->footer_logo = $imageName;
                    }
                }
                $logo->save();
                return redirect()->back()->with('success', 'Update order Status successfully !');
            }
        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
        return view('settings.logo_copyright');
    }

    public function socialLinks(Request $request)
    {
        Session::put('page', 'socialLinks');
        $data = SocialLink::first();
        return view('settings.social_links', compact('data'));
    }


    public function updateSocialLinks($id, Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $user=Auth::user();
        try {
            $links = SocialLink::where('user_id',$user->id)->first();

            if ($request->isMethod('post')) {
                $data = $request->all();
                $links->facebook_link = $data['facebook_link'];
                $links->instagram_link = $data['instagram_link'];
                $links->twitter_link = $data['twitter_link'];
                $links->save();
                return redirect()->back()->with('success', 'Update order Status successfully !');
            }
            return view('settings.social_links');
        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }



    public function userSettings()
    {
        $user = Auth::user();
        return view('settings.user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userSettingsStore(Request $request)
    {
        $request->validate(
            [
                'username' => 'required'
            ]
        );
        try {
            $user = Auth::user();

            $user_update = User::findOrFail($user->id);
            $user_update->username = $request->username;
            if (!is_null($request->password)) {
                $user_update->password = Hash::make($request->password);
            } else {
                $user_update->password = $user->password;
            }
            $user_update->save();

            $notification = array(
                'Message' => 'Settings Updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('settings.edit');
    }
}
