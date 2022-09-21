<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchByCategory($id)
    {
        //return $id;
        $blogs = Blog::join('categories as cat', 'blogs.category_id', 'cat.id')
            ->select(
                'blogs.*',
                'cat.title as cateTitle',
            )
            ->where('category_id', $id)
            ->get();
        return view('searchBlogs', compact('blogs'));
    }

    public function search(Request $request)
    {
        try {
            $search = $request->search;
            $blogs = Blog::join('categories as cat', 'blogs.category_id', 'cat.id')
                ->select(
                    'blogs.*',
                    'cat.title as cateTitle',
                )
                ->where('blogs.title', 'LIKE', '%' . $search . '%')->get();
            return view('searchBlogs', compact('blogs'));
        } catch (\Exception $e) {
            session()->flash('error', "Something Went Wrong");
            return back();
        }
    }
}
