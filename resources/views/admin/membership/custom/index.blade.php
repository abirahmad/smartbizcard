@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper pb-5">
      
            <div class="container-fluid pt-5 ">
                <div class="basic-card p-3 mx-3">
                <div class="row">
                    <div class="col-lg-10 col-8 ">
                        <h4 class="allbizcard__head">Custom Settings</h4>
                    </div>
                    <div class="col-lg-2 col-4 ">
                        <button type="button" class="btn btn-primary border-radius20 py-1 px-3" data-toggle="modal"
                            data-target="#customSettingsModalCenter">Add
                            New</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table" id="plan">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Enable/Disable</th>
                                        <th scope="col">Action</>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <span class="badge badge-success">Enable</span>
                                                @else
                                                    <span class="badge badge-danger">Disable</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.custom-settings.edit', $item->id) }}"
                                                    class="action__edit"><i class="fas fa-pencil-alt membership"></i> <span>Edit</span></a>

                                                <form class="delete__btn" action="{{ route('admin.custom-settings.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action__delete__after"><i
                                                            class="fas fa-trash-alt membership"></i><span> Delete</span></button>
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


            <div class="modal fade" id="customSettingsModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="customSettingsModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header my-mod-header">
                            <h5 class="modal-title" id="customSettingsModalLongTitle">Add New</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="close__modal">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('admin.custom-settings.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Title</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="inputEmail3" name="title" placeholder="Title">

                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword6" class="col-sm-4 col-form-label">Status</label>
                                    <div class="col-sm-6">
                                        <select class="form-control @error('status') is-invalid @enderror"
                                            id="inputPassword6" name="status">
                                            <option value="0">Enable</option>
                                            <option value="1">Disable</option>
                                        </select>
                                        @error('status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>

                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
