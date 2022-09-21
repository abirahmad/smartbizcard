<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QrBuilder;
use App\Models\VcardUrl;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class QrCodeController extends Controller
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
     * 
     * Qr code setting save
     */
    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $qr_settings = QrBuilder::where('user_id', $user->id)->first();
            $vcard_urls = VcardUrl::where('user_id', $user->id)->first();
            if (!is_null($vcard_urls)) {
                if (!is_null($qr_settings)) {
                    QrBuilder::where('user_id', $user->id)
                        ->update([
                            'user_id' => $user->id,
                            'foreground_color' => $request->foreground_color,
                            'background_color' => $request->background_color,
                            'qr_text' => $request->qr_text,
                            'text_color' => $request->text_color,
                            'qr_size' => (int)$request->qr_size,
                            'updated_at' => Carbon::now()
                        ]);
                } else {

                    $qr_code = new QrBuilder();
                    $qr_code->user_id = $user->id;
                    $qr_code->foreground_color = $request->foreground_color;
                    $qr_code->background_color = $request->background_color;
                    $qr_code->qr_text = $request->qr_text;
                    $qr_code->text_color = $request->text_color;
                    $qr_code->qr_size = (int)$request->qr_size;
                    $qr_code->created_at = Carbon::now();
                    $qr_code->updated_at = Carbon::now();
                    $qr_code->save();
                }
                $notification = array(
                    'Message' => 'QR Code inserted successfully!',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'Message' => 'There is no card generated!',
                    'alert-type' => 'error'
                );
            }

            return back()->with($notification);
            
        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
}
