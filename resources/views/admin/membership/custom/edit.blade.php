@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper pb-5">
        <div class="pt-5">
            <div class="container-fluid ">
                <div class="basic-card p-3 mx-3">
                <div class="row">
                    <div class="col-lg-10 col-12">
                        <h4 class="allbizcard__head">Edit Custom Settings</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('admin.custom-settings.update', $setting_details->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Title</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="inputEmail3" name="title" placeholder="Title"
                                        value="{{ $setting_details->title }}">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword6" class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-6">
                                    <select class="form-control @error('status') is-invalid @enderror" id="inputPassword6"
                                        name="status">
                                        <option value="0" {{ $setting_details->status == '0' ? 'selected' : ' ' }}>Enable
                                        </option>
                                        <option value="1" {{ $setting_details->status == '1' ? 'selected' : ' ' }}>Disable
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <div class="col-sm-6">
                                    <input type="submit" class="btn btn-primary" value="Update">
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
