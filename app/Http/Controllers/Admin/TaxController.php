<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin_Tax;
use Illuminate\Support\Facades\Auth;

class TaxController extends Controller
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
        $items = Admin_Tax::select('id', 'internal_name', 'name', 'value', 'type')->get();
        return view('admin.membership.taxes.index', compact('items'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        // return $request;
        $request->validate([
            'internal_name' => 'required|max:255',
            'name' => 'required|max:255',
            'value' => 'required|numeric',
            'value_type' => 'required',
            'type' => 'required',
            'billing_type' => 'required',
            'country' => 'required|max:255',
        ]);

        $data = new Admin_Tax;
        $data->user_id = auth()->user()->id;
        $data->internal_name = $request->internal_name;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->value = $request->value;

        if ($request->value_type == '1') {
            $data->value_type = 'percentage';
        } elseif ($request->value_type == '2') {
            $data->value_type = 'fixed';
        }

        if ($request->type == '1') {
            $data->type = 'inclusive';
        } elseif ($request->type == '2') {
            $data->type = 'exclusive';
        }

        if ($request->billing_type == '1') {
            $data->billing_type = 'personal';
        } elseif ($request->billing_type == '2') {
            $data->billing_type = 'business';
        } elseif ($request->billing_type == '3') {
            $data->billing_type = 'both';
        }

        $data->country = $request->country;

        $data->save();

        $notification = array(
            'Message' => 'Tax Created successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function edit($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $tax_details = Admin_Tax::Find($id);
        return view('admin.membership.taxes.edit', compact('tax_details'));
    }

    public function update(Request $request, $id)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'internal_name' => 'required|max:255',
            'name' => 'required|max:255',
            'value' => 'required|numeric',
            'country' => 'required|max:255',
        ]);

         $update_tax = Admin_Tax::Find($id);
         $update_tax->user_id = auth()->user()->id;
         $update_tax->internal_name = $request->internal_name;
         $update_tax->name = $request->name;
         $update_tax->description = $request->description;
         $update_tax->value = $request->value;
         $update_tax->value_type = $request->value_type;
         $update_tax->type = $request->type;
         $update_tax->billing_type = $request->billing_type;
         $update_tax->country = $request->country;
         $update_tax->update();

         $notification = array(
            'Message' => 'Tax updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.taxes.index')->with($notification);
    }

    public function destroy($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $destroy = Admin_Tax::Find($id);
        $destroy->delete();
        $notification = array(
            'Message' => 'Item remove from list successfully!',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }
}
