@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
<div class="container-fluid pt-5">
<div class="table__container m-2">
    <div class="row">
        <div class="col-lg-12">
            
                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
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
                                    <div class="form-group has-success">
                                        <label class="control-label" for="status">Categories <span class="required">*</span></label>
                                        <select class="form-control custom-select" id="status" name="category_id" required>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="image">Blog Featured Image <span class="optional">(optional)</span></label>
                                        <input type="file" class="form-control dropify" style="padding: .2rem .25rem;" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="image" name="image" value="{{ old('image') }}"/>
                                    </div>
                                </div>
            
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label" for="status">Status <span class="required">*</span></label>
                                        <select class="form-control custom-select" id="status" name="status" required>
                                            <option value="1" {{ old('status') === 1 ? 'selected' : null }}>Publish</option>
                                            <option value="0" {{ old('status') === 0 ? 'selected' : null }}>Pending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row ">
                                <div class="col-md-12">
                                    <div  class="form-group">
                                        <label class="control-label" for="description">Blog Description <span class="optional">(optional)</span></label>
                                        <textarea id="summernote" type="text" class="form-control tinymce_advance" id="description" name="description" value="{{ old('description') }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="meta_description">Blog Meta Description <span class="optional">(optional)</span></label>
                                        <textarea type="text" class="form-control" id="meta_description" name="meta_description" value="{{ old('meta_description') }}" placeholder="Meta description for SEO"></textarea>
                                    </div>
                                    <div class="form-actions">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
                                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-dark">Cancel</a>
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

