<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PaymentTransaction;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'username', 'email', 'image', 'designation', 'status')
                 ->where('is_admin', 0)
                 ->get();
        return view('admin.users.index', compact('users'));
    }

    public function view($id)
    {
        $user = User::select('id', 'first_name', 'last_name', 'username', 'email', 'image', 'designation', 'description', 'status', 'sex', 'phone', 'address', 'country', 'city')
                ->where('id', $id)
                 ->first();
        // return $user;

        return view('admin.users.view', compact('user'));
    }

    public function statusUpdate(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->status = $request->status;
        $user->update();

        $datas = PaymentTransaction::where('user_id', $id)->get();
        foreach($datas as $data){
            $data->status = $request->status;  
            $data->update();
        }

        $notification = array(
            'Message' => 'Status update successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        $notification = array(
            'Message' => 'Successfully user remove from the system',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
