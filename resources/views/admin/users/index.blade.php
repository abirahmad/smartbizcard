@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">

    <div class="container-fluid pt-5">
        <div class="card p-4">
        <div class="d-block p-3">
            <h4 class="allbizcard__head float-left">User List</h4>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- <div class="container-fluid">
                    <div class="table-responsive product-table">
                        <table class="table table-bordered table-striped" id="users_table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" width="100">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div> -->




                <div class="table-responsive">
                            <table class="table" id="user_list">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><span style="text-transform: capitalize;">{{ $user->username }}</span></td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <img src="{{asset('public/assets/images/user/'.$user->image )}}" alt="user profile" width="50px" height="40px">
                                            </td>
                                            <td>{{ $user->designation }}</td>
                                            <td>
                                                <a href="#changeStatusModal{{ $user->id }}" data-toggle="modal">
                                                        @if($user->status == 1)
                                                           <span class="action__edit__blue"><i class="fa fa-check"></i> Active</span> 
                                                        @else
                                                           <span class="action__delete__after"><i class="fa fa-times"></i> Inactive</span> 
                                                        @endif     
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.user.view', $user->id)}}"><span class="action__edit__blue"><i class="fas fa-eye"></i> View</span></a>
                                                <!-- <a href="" class="btn btn-primary">Edit</a> -->
                                                <a href="#deleteUserModal{{ $user->id }}" data-toggle="modal"><span class="action_delete_danger"><i class="fas fa-trash-alt"></i> Delete</span></a>
                                            </td>
                                    </tr>

                                    <!-- status update modal -->
                                    <div class="modal fade bd-example-modal-sm" id="changeStatusModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title"><span style="text-transform: capitalize;">{{ $user->username }}</span></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <div class="modal__body-invoice">
                                                <form role="form" action="{{route('admin.user.update.status', $user->id)}}" method="post">
                                                @csrf
                                                    <div class="form-row">
                                                    <div class="col-lg-6 col-12">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="0" {{$user->status == 0 ? 'selected' : ''}}>Inactive</option>
                                                        <option value="1" {{$user->status == 1 ? 'selected' : ''}}>Active</option>
                                                    </select>
                                                    </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-2">Update Status</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                    <!-- Delete user Modal-->
                                    <div class="modal fade bd-example-modal-lg" id="deleteUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title"><span style="text-transform: capitalize;">{{ $user->username }}</span></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <div class="modal__body-invoice">
                                                <form role="form" action="{{route('admin.user.destroy', $user->id)}}" method="post">
                                                @csrf
                                                    <div class="form-row">
                                                    <div class="col-lg-6 col-12">
                                                        <h4>Are you sure to delete <span style="text-transform: capitalize;">{{$user->username}}</span> ?</h4>
                                                    </div>
                                                    </div>
                                                    <button type="submit" class="action_delete_form"><span><i class="fas fa-trash-alt"></i> Delete</span></button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
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