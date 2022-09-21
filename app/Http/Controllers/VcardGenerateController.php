<?php

namespace App\Http\Controllers;

use App\Models\ScanDetail;
use App\Models\SmartCard;
use App\Models\User;
use App\Models\VcardUrl;
use App\Models\CardSocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JeroenDesloovere\VCard\VCard;

class VcardGenerateController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function vcardGenerate($name,$slug)
  {
    try {
      $ip_address = request()->ip();
      $user = User::where('username', $name)->first();
      $scan_detail = ScanDetail::where('ip_address', $ip_address)->first();

      if (request()->ip() == '::1') {
        $id_address = null;
      }

      //Saving Scan Details information of a card
      if (empty($scan_detail)) {
        $count = new ScanDetail();
        $count->user_id = $user->id;
        $count->ip_address = request()->ip();
        $count->save();
      }

      //Submit Card Url of a user
      $url = url()->current();
      $url_submit =VcardUrl::where('user_id',$user->id)->first();

      if(!is_null($url_submit)){
        $url_submit->user_id = $user->id;
        $url_submit->card_url = $url;
        $url_submit->update();
      }else{
        $url_submit=new VcardUrl();
        $url_submit->user_id=$user->id;
        $url_submit->card_url=$url;
        $url_submit->save();
      }

      //Fetching Social Link for card
      $vcard = SmartCard::where('user_id', $user->id)->first();
      // dd($vcard->main_image);
      $facebook = CardSocialLink::select('id', 'social_link')
                  ->where('user_id', $user->id)
                  ->where('label', 'Facebook')
                  ->first();
      $twitter = CardSocialLink::select('id', 'social_link')
                  ->where('user_id', $user->id)
                  ->where('label', 'Twitter')
                  ->first();
      $linkedIn = CardSocialLink::select('id', 'social_link')
                  ->where('user_id', $user->id)
                  ->where('label', 'Linked In')
                  ->first();
      $snapchat = CardSocialLink::select('id', 'social_link')
                  ->where('user_id', $user->id)
                  ->where('label', 'Snapchat')
                  ->first();
      $whatsapp = CardSocialLink::select('id', 'social_link')
                  ->where('user_id', $user->id)
                  ->where('label', 'Whatsapp')
                  ->first();
      $youtube = CardSocialLink::select('id', 'social_link')
                  ->where('user_id', $user->id)
                  ->where('label', 'Youtube')
                  ->first();

    } catch (\Exception $e) {
      session()->flash('db_error', $e->getMessage());
      DB::rollBack();
      return back();
    }
    return view('vcards.vcard', compact('user', 'vcard', 'facebook', 'twitter', 'linkedIn', 'snapchat', 'whatsapp', 'youtube'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function vcfFileGenerate()
  {
    try {
      $user = Auth::user();
      $my_vcard = SmartCard::where('user_id', $user->id)->first();
      // define vcard
      $vcard = new VCard();

      // define variables
      $lastname = $my_vcard->title;
      $firstname = $my_vcard->full_name;
      $additional = '';
      $prefix = '';
      $suffix = '';
     $url=VcardUrl::where('user_id',$user->id)->first();
      // add personal data
      $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

      // // add work data
      $vcard->addCompany($my_vcard->company);
      $vcard->addJobtitle($my_vcard->title);
      $vcard->addRole($user->designation);
      $vcard->addEmail($my_vcard->email);
      $vcard->addPhoneNumber($my_vcard->phone);
      $vcard->addPhoneNumber($my_vcard->phone_office);
      $vcard->addAddress($user->address);
      $vcard->addLabel('street, worktown, workpostcode Belgium');
      $vcard->addURL($url->card_url);

      $vcard->addPhoto('public/backend/images/vcard/images/' . $my_vcard->cover_image);

      // return vcard as a string
      //return $vcard->getOutput();

      // return vcard as a download
      return $vcard->download();

      // save vcard on disk
      //$vcard->setSavePath('/path/to/directory');
      //$vcard->save();
    } catch (\Exception $e) {
      session()->flash('error', 'Something Went Wrong');
      return back();
    }
  }
}
