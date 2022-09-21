<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Yajra\DataTables\Facades\DataTables;
use Auth;
class AdminController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        // if (!auth()->user()->is_admin) {
        //     abort(403, 'Unauthorized action.');
        // }

        // if (request()->ajax()) {
        //     $business_id = request()->session()->get('user.business_id');

        //     $users = User::select(['name', 'email', 'id','designation'])->get();

        //     return Datatables::of($users)
        //         // ->addColumn(
        //         //     'action',
        //         //     '<button data-href="{{action(\'AdminController@edit\', [$id])}}" class="btn btn-xs btn-primary btn-modal" data-container=".expense_category_modal"><i class="glyphicon glyphicon-edit"></i>  @lang("messages.edit")</button>
        //         //         &nbsp;
        //         //         <button data-href="{{action(\'AdminController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_expense_category"><i class="glyphicon glyphicon-trash"></i> @lang("messages.delete")</button>'
        //         // )
        //         ->removeColumn('id')
        //         ->rawColumns([3])
        //         ->make(false);
        // }

        // return view('admin.users.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function adminView()
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $adminId = Auth::user()->id;
        $username = Auth::user()->username;
        $email = Auth::user()->email;
        return view('admin.admin.index', compact('username', 'email', 'adminId'));
    }

    public function adminUsernameEmail(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $request->validate([
            'username' =>'required|min:4|string|max:255|unique:users,username,'.$id,
            'email'=>'required|email|string|max:255|unique:users,email,'.$id,
        ]);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->update();
        $notification = array(
            'Message' => 'Admin username & email updated successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function updateAdminPassword(Request $request, $id)
    {
        $request->validate([
            'password_current' => 'required',
            'password' => [
                'required', 'string', 'confirmed',
                Password::min(8)->letters()->numbers()->mixedCase()->symbols()
            ],
        ]);

        $user = User::where('id', $id)->first();

        if($user)
        {
            if(Hash::check($request->password_current, $user->password))
            {
                    $user->password = Hash::make($request->password);
                    $user->update();
                    $notification = array(
                        'Message' => 'Your password has been updated successfully',
                        'alert-type' => 'success'
                    );
                    return back()->with($notification);
            }
            else{
                $notification = array(
                    'Message' => 'Your current password is not correct',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }
        }
        else{
            $notification = array(
                'Message' => 'User not found',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }
}
