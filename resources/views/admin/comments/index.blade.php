@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">


<div class="container-fluid pt-5 ">
    <div class="table__container p-4 mx-2">
    <div class="row">
        <div class="col-lg-12">
            <div class="container-fluid">
                <div class="table-responsive product-table">
                    <table class="table table-striped table-bordered display ajax_view" id="blogs_table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" ></th>
                                <th>SI</th>
                                <th>Blog Name</th>
                                <th>User</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $key=>$comment)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{$comment->title}}</td>
                                    <td>{{$comment->username}}</td>
                                    <td>{!!$comment->name!!}</td>
                                    <td>{{$comment->email}}</td>
                                    <td>{{$comment->comment}}</td>
                                    <td >
                                        @if ($comment->status==0)
                                           <p class="Cstatus badge badge-danger sinactive" data-id="{{$comment->id}}" >Inactive</p> 
                                        @else
                                        <p class="Cstatus badge badge-success sactive" data-id="{{$comment->id}}" >Active</p>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        <a href="{{route('admin.comment.delete',$comment->id)}}" class="btn btn-danger btn-sm" >Delete</a>
                                        <a href="{{route('admin.comment.status.update',$comment->id)}}" class="btn btn-success btn-sm" >change status</a>
                                        
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
@endsection