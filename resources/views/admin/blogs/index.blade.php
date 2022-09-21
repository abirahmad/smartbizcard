@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper pb-5">

    <div class="container-fluid pt-5">
        <div class="basic-card p-2 mx-3">
        <div class="pt-3 pr-2">
            <h4 class="allbizcard__head float-left pl-2">All Blogs</h4>
            <a href="{{route('admin.blogs.create')}}" class="btn btn-md btn-primary float-right border-radius20 px-3 py-1">Add New</a>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="container-fluid">
                    <div class="table-responsive product-table">
                        <table class="table table-striped  display ajax_view" id="blogs_table">
                            <thead>
                                <tr>
                                    <th scope="col"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Categories</th>
                                   
                                    {{-- <th scope="col">Image</th> --}}
                                    <th scope="col">Status</th>
                                    <th scope="col" width="100">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $key=>$blog)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$blog->username?$blog->username:''}}</td>
                                        <td>{{$blog->title?$blog->title:''}}</td>
                                        <td>
                                            <img src="{{$blog->image?asset('public/assets/images/blogs/'.$blog->image):''}}" height="100px" width="100px">
                                        </td>
                                        <td>
                                            @if ($blog->status==0)
                                               <samp class="badge badge-danger sinactive">Inactive</samp>
                                            @else
                                                <samp class="badge badge-success sactive" >Active</samp>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.blogs.edit',$blog->id)}}" class="action__edt"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{route('admin.blog.status',$blog->id)}}" class="action__edt"><i class="fas fa-toggle-on"></i></a>
                                            <form class="blogs__form" action="{{route('admin.blogs.destroy',$blog->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="action__delete__allBlog"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>
@endsection