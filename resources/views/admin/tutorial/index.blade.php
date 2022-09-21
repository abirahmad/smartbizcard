@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">

    <div class="tutorial-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="float-right my-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#tutorialModalCenter">Add
                            New</button>
                    </div>
                    <div class="clear-fix"></div>
                </div>
            </div>
            <div class="row mb-2" style="padding-left: 20px">
                @if(count($tutorials) > 0)
                @foreach ($tutorials as $tutorial)
                <div class="col-lg-3 col-md-6">
                    <div class="card p-2 single-tutorial bg-light">
                        <div class="">
                            <iframe width="100%" height="200" style="border-radius: 12px"
                                src="{{$tutorial->link}}">
                            </iframe>
                            <div class="pt-2  single-tutorial-details">
                                <h6>{{$tutorial->title}}</h6>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="video-time">
                                        {{$tutorial->created_at->diffForHumans( )}}
                                        </p>


                                    </div>
                                    <div class="col-6">
                                        <p class="video-date">
                                            {{ \Carbon\Carbon::parse($tutorial->created_at)->format('D d F Y') }}
                                        </p>

                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <h3>No Tutorials are available if you want to create tutorial then click on Add New button and creat tutorial</h3>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tutorialModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="customSettingsModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header my-mod-header">
                            <h5 class="modal-title" id="customSettingsModalLongTitle">Add New Tutorial</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="close__modal">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{route('admin.store.tutorial')}}" method="POST">
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
                                <label for="link" class="col-sm-4 col-form-label">Tutorial Link</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('link') is-invalid @enderror"
                                            id="link" name="link" placeholder="link">

                                        @error('link')
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
@endsection
