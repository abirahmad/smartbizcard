<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendBlogController extends Controller
{

    /**
     * All Blogs
     */
    public function blogs()
    {
        //$blogs=Blog::get();
        $blogs = Blog::join('categories as cat', 'blogs.category_id', 'cat.id')
            ->select(
                'blogs.*',
                'cat.title as cateTitle',
            )
            ->orderBy('created_at', 'DESC')
            ->where('blogs.status', 1)
            ->paginate(10);

        return view('all-blogs', compact('blogs'));
    }

    /**
     * Blog Details
     */
    public function singlePost($id)
    {
        // $sblog=Blog::find($id)->first();
        $sblog = Blog::join('categories as cat', 'blogs.category_id', 'cat.id')
            ->select(
                'blogs.*',
                'cat.title as cateTitle',
            )
            ->where('blogs.id', $id)
            ->first();
        //dd($sblog);
        return view('front-end.single-blog', compact('sblog'));
    }

    /**
     * Comments
     */
    public function commentIndex()
    {
        //    return $kk=Comment::get();
        $comments = Comment::join('blogs as bl', 'comments.blog_id', 'bl.id')
            ->join('users as ur', 'comments.user_id', 'ur.id')
            ->select(
                'comments.*',
                'bl.title',
                'ur.username',
            )
            ->get();
        return view('admin.comments.index', compact('comments'));
        // return $comments;
    }

    /**
     * Blog Comment Create
     */
    public function blogComment(Request $request, $id)
    {
        try {
            //return $request;
            if (Auth::Check()) {
                $data = array();
                $data['blog_id'] = $id;
                $data['name'] = $request->name;
                $data['email'] = $request->email;
                $data['comment'] = $request->comment;
                $data['status'] = 0;
                $data['created_at'] = Carbon::now();
                $data['updated_at'] = Carbon::now();
                $data['user_id'] = Auth::user()->id;
                $blogs = Comment::insert($data);

                return redirect()->back();
            } else {

                return redirect()->back()->with('error', 'You have to be logged in');
            }
        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    public function commentEdit($id)
    {
        $comment = Comment::find($id);
        return view('bb', compact('comment'));
    }

    /**
     * Comment Update
     */
    public function commentupdate(Request $request, $id)
    {
        try {
            $data = array();
            $data['blog_id'] = $id;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['comment'] = $request->comment;
            $data['status'] = 0;
            $data['user_id'] = Auth::user()->id;
            $blogs = Comment::find($id)->update($data);

            $notification = array(
                'Message' => 'Comment updated successfully!',
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
     * Comment Status UPdate
     */
    public function commentStatusUpdate($id)
    {
        try {
            //return $id;
            $comment = Comment::where('id', $id)->first();

            //return $comment->status;
            if ($comment->status == 1) {
                $data = array();
                $data['status'] = 0;
                $blogs = Comment::find($id)->update($data);
            } else {
                $data = array();
                $data['status'] = 1;
                $blogs = Comment::find($id)->update($data);
            }

            //response()->json(['success' => 'Comment status updated successfully']);

            $notification = array(
                'Message' => 'Comment status updated successfully!',
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
     * Comment Delete
     */
    public function commentDelete($id)
    {
        try {
            $comment = Comment::find($id)->delete();

            $notification = array(
                'Message' => 'Comment removed successfully!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
}
