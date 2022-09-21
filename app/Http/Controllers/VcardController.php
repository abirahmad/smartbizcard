<?php

namespace App\Http\Controllers;

use App\Helpers\UploadHelper;
use App\Models\CardSocialLink;
use App\Models\PaymentTransaction;
use App\Models\QrBuilder;
use App\Models\ShareContact;
use App\Models\SmartCard;
use App\Models\User;
use App\Models\VcardUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VcardController extends Controller
{
    protected $accessKey = '1a16715ccd10b1c6e5e4d5636890f51d';
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
        $user_id = Auth::user()->id;
        return view('vcards.index')->with('user_id');
    }
    public function create()
    {
        $user = Auth::user();
        $vcards = SmartCard::where('user_id', $user->id)->first();
        return view('vcards.create', compact('user', 'vcards'));
        // return view('vcards.create')->with('user_id','vcards');
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $logo = null;
            $banner = null;
            $vcard_id = null;
            $social_update=false;
            $social_create=false;
            $vcards = SmartCard::where('user_id', $user->id)->first();
            $transaction=PaymentTransaction::where('user_id',$user->id)->first();

            // $this->validate($request, [
            //     'main_image' => 'required|unique:posts|max:255'
            // ]);

            if(!empty($transaction)){
                if($transaction->status==1){
                    if (!is_null($request->main_image)) {
                        $logo = UploadHelper::upload('image', $request->main_image, $request->title . 'main_image-' . time(), 'public/backend/images/vcard/images');
                    }else{
                        $logo=$vcards->main_image;
                    }
        
                    if (!is_null($request->cover_image)) {
                        $banner = UploadHelper::upload('image', $request->cover_image, $request->title . 'cover_image-' . time(), 'public/backend/images/vcard/images');
                    }else{
                        $banner=$vcards->cover_image;
                    }
        

                    //storing vcards
                    DB::beginTransaction();
                    if (!is_null($vcards)) {
                        SmartCard::where('user_id', $user->id)
                            ->update([
                                'user_id' => $user->id,
                                'main_image' => $logo,
                                'cover_image' => $banner,
                                'slug' => $request->slug,
                                'title' => $request->title,
                                'full_name' => $request->full_name,
                                'color' => $request->color,
                                'company' => $request->company,
                                'description' => $request->description,
                                'email' => $request->email,
                                'phone' => $request->phone,
                                'phone_office' => $request->phone_office,
                                'details' => $request->details,
                            ]);
                            
                            if(!empty($request['socialInput'])){
                                $social_update=true;
                            }
                            
                    } else {
                        $vcard_id = SmartCard::insertGetId([
                            'user_id' => $user->id,
                            'main_image' => !is_null($logo) ? $logo : null,
                            'cover_image' => !is_null($banner) ? $banner : null,
                            'slug' => $request->slug,
                            'title' => $request->title,
                            'full_name' => $request->full_name,
                            'color' => $request->color,
                            'company' => $request->company,
                            'description' => $request->description,
                            'email' => $request->email,
                            'phone' => $request->phone,
                            'phone_office' => $request->phone_office,
                            'details' => $request->details,
                        ]);
                        if(!empty($request['socialInput'])){
                            $social_create=true;
                        }
                    }
                    $i=0;
                    if( $social_create=true){
                        foreach($request['socialInput'] as $value){
                            $vcardSocial= new CardSocialLink();
                            $vcardSocial->user_id=Auth::user()->id;
                            $vcardSocial->social_link=$value;
                            $vcardSocial->label=$request['hiddenlevel'][$i];
                            $vcardSocial->save();
                            $i++;
                        }
                    }elseif($social_update=true){
                        foreach($request['socialInput'] as $value){
                            $vcardSocial= CardSocialLink::find($request['hidenItem'][$i]);
                            $vcardSocial->user_id=Auth::user()->id;
                            $vcardSocial->social_link=$value;
                            $vcardSocial->label=$request['hiddenlevel'][$i];
                            $vcardSocial->save();
                            $i++;
                        }
                    }
        
                    DB::commit();
                    if (!is_null($vcard_id)) {
                        $notification = array(
                            'Message' => 'Smart Card Created successfully!',
                            'alert-type' => 'success'
                        );
                    } else {
                        $notification = array(
                            'Message' => 'Smart Card updated successfully!',
                            'alert-type' => 'success'
                        );
                    }
                }else{
                    $notification = array(
                        'Message' => 'You have to be a member in order to create a card',
                        'alert-type' => 'error'
                    ); 
                }
            }else{
                $notification = array(
                    'Message' => 'You have to be a member in order to create a card',
                    'alert-type' => 'error'
                ); 
            }
            
            

        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
        return redirect()->route('vcard.create')->with($notification);
    }

    public function qrCodeGenerate()
    {
        $user = Auth::user();
        $url = VcardUrl::orderBy('id', 'desc')->where('user_id', $user->id)->first();
        $vcard = SmartCard::where('user_id', $user->id)->first();
        $qrCode = QrBuilder::where('user_id', $user->id)->orderBy('id', 'desc')->first();
            // dd((int)$qrCode->text_color);
        return view('vcards.qr_code', compact('url', 'user', 'vcard', 'qrCode',));
    }


    public function getCardSocialLink()
    {
        $links = CardSocialLink::select('id','social_link')->get();
        return response()->json(['status' => true, 'options' => $links], 200);
    }

    public function postShareContact($reference){
       try{
        $user=Auth::user();
        $share=ShareContact::where('user_id',$user->id)->first();
        $vcard=SmartCard::where('user_id',$reference)->first();
        $ref_user=User::where('id',$reference)->first();
         if(!is_null($share)){
            $notification = array(
                'Message' => 'You have already shared this ',
                'alert-type' => 'error'
            );
         }else{
            ShareContact::create(['user_id'=>$user->id,'reference_id'=>$reference]);
            $notification = array(
               'Message' => 'You have successfuly shared this card',
               'alert-type' => 'success'
           ); 
         }
        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
        return redirect('smart-vcard/'.$ref_user->username.'/'.$vcard->slug)->with($notification);
    }

    public function shareContact()
    {
        $user_id = Auth::user()->id;
        $share_contact = ShareContact::select('reference_id')
                            ->where('reference_id', $user_id)
                            ->first();
        // $share_id = $share_contact->reference_id;
        if(!empty($share_contact)){
             $users = User::where('id', '=', $share_contact->reference_id)->get();
        }else{
            $users=null;
        }
        return view('share_contact.share_contact', compact('users'));
    }
}
