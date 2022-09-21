<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
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
        $categories = Category::get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        // return $request;
        $data = array();
        $data['title'] = $request->title;
        $data['slug'] = $request->slug;
        $data['position'] = $request->position;
        $data['active'] = $request->active;
        // $categories = DB::table('blog_categories')->insert($data);
        $categories = Category::insert($data);
        $notification = array(
            'Message' => 'Category created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.categories.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        return $id;
        $categories = DB::table('blog_categories')->where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        // $categories = DB::table('blog_categories')->where('id',$id)->get();
        $categories = Category::find($id);
        return view('admin.categories.edit', compact('categories'));
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
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        //return $request;
        $data = array();
        $data['title'] = $request->title;
        $data['slug'] = $request->slug;
        $data['position'] = $request->position;
        $data['active'] = $request->active;
        //$categories = DB::table('blog_categories')->where('id',$id)->update($data);
        $categories = Category::find($id)->update($data);
        $notification = array(
            'Message' => 'Category updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        //DB::table('blog_categories')->where('id',$id)->delete();
        $categories = Category::find($id)->delete();
        $notification = array(
            'Message' => 'Category has been deleted successfully !!',
            'alert-type' => 'error'
        );

        return redirect()->route('admin.categories.index')->with($notification);
    }
}
