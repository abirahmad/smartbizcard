<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\StringHelper;
use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{

    public $user;

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
        
        $blogs = Blog::join('users as ur','blogs.author','ur.id')
                        ->select(
                            'blogs.*',
                            'ur.username', 
                        )
                        ->get();
        return view('admin.blogs.index',compact('blogs'));
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
        $categories=Category::where('active','1')->get();
        return view('admin.blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate(
            [
                'title'  => 'required|max:100',
                'image'  => 'nullable|image'
            ],
            [
                'title.required' => 'Please give a title'
            ]
        );
            
            $data=array();
            $data['title']=$request->title;
            if (!is_null($request->image)) {
                $data['image'] = UploadHelper::upload('image', $request->image, 'mr' . '-' . time() . 'moon', 'public/assets/images/blogs');
            }
            $data['description']=$request->description;
            //$data['slug']=$request->title;
            $data['tags']=$request->meta_description;
            $data['author']=Auth::user()->id;
            $data['status']=$request->status;
            $data['created_at']=Carbon::now();
            $data['updated_at']=Carbon::now();
            $data['category_id']=$request->category_id;
            $blogs = Blog::insert($data);
            $notification = array(
                'Message' => 'Blogs created successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.blogs.index')->with($notification);
        
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
        $blog = Blog::find($id);
        $categories=Category::get();
        return view('admin.blogs.show', compact('blog','categories'));
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
        $blog = Blog::find($id);
        $categories=Category::get();
        return view('admin.blogs.edit', compact('blog','categories'));
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
        
        $blog = Blog::find($id);
        if (is_null($blog)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.blogs.index');
        }

        $request->validate([
            'title'  => 'required|max:100',
        ]);
        //return $id;
        
        $data=array();
        $data['title']=$request->title;
        if (!is_null($request->image)) {
            $data['image'] = UploadHelper::upload('image', $request->image, $request->title . '-' . time() . '-logo', 'public/assets/images/blogs');
        }
        $data['description']=$request->description;
        $data['tags']=$request->meta_description;
        $data['author']=Auth::user()->id;
        $data['status']=$request->status;
        $data['updated_at']=Carbon::now();
        $data['category_id']=$request->category_id;

        if(!is_null($request->image)){
            $blog = Blog::find($id);
            $blogImagePath='public/assets/images/blogs/'.$blog['image'];
            if(file_exists($blogImagePath)){
            
                unlink($blogImagePath);
                
            }
        }

        $blog=Blog::find($id)->update($data);
        $notification = array(
            'Message' => 'Blogs updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blogs.index')->with($notification);
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
        $blog = Blog::find($id);
        if (is_null($blog)) {
            session()->flash('error', "The page is not found !");
            return redirect()->back();
        }

        $blogImagePath='public/assets/images/blogs/'.$blog['image'];
        if(file_exists($blogImagePath)){
          
            unlink($blogImagePath);
            
        }

        Blog::find($id)->delete();

        $notification = array(
            'Message' => 'Blogs removed successfully!',
            'alert-type' => 'error'
        );
        return redirect()->route('admin.blogs.index')->with($notification );
    }  
    
    
    public function blogStatusUpdate($id)
    {
        //return $id;
        $comment=Blog::where('id',$id)->first();
       
       //return $comment->status;
        if ($comment->status == 1) {
            $data=array();
            $data['status']= 0;
            $blogs = Blog::find($id)->update($data);
        }else{
            $data=array();
            $data['status']= 1;
            $blogs = Blog::find($id)->update($data);
        }

        //response()->json(['success' => 'Comment status updated successfully']);

        $notification = array(
            'Message' => 'Comment status updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
