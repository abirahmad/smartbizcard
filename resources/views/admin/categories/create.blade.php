@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">

<div class="container-fluid pt-5">
    <div class="table__container mx-2">
    <div class="row">
        <div class="col-lg-12">
            
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                    @csrf
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Blog Title <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter Title" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="slug">Slug <span class="optional"></span></label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Enter short url (Keep blank to auto generate)" />
                                    </div>
                                </div>
                            </div>
            
                            
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group has-success">
                                        <label class="control-label" for="status">Active <span class="required">*</span></label>
                                        <select class="form-control custom-select" id="status" name="active" required>
                                            <option value="1" {{ old('status') === 1 ? 'selected' : null }}>Active</option>
                                            <option value="0" {{ old('status') === 0 ? 'selected' : null }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Position <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="position" name="position" value="{{ old('title') }}" placeholder="Enter Position" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-actions">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                            <a href="{{ route('admin.categories.index') }}" class="btn btn-dark">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection