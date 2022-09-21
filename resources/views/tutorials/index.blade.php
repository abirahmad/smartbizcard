@extends('layouts.master')

@section('content')
<div class="content-wrapper">

    <div class="tutorial-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h5 class="font-weight-bold card-edit-title ml-lg-4 mb-3 mt-2">Tutorial List</h5>
                </div>
            </div>
            <div class="row mb-2" style="padding-left: 20px">
            @if (count($tutorials)>0)
            @foreach ($tutorials as $tutorial)
                <div class="col-lg-3 col-md-6">
                    <div class="card p-2 single-tutorial bg-light">
                        <div class="">
                            <iframe width="100%" height="200" style="border-radius: 12px"
                                src="{{$tutorial->link}}">
                            </iframe>
                            <div class="pt-2  single-tutorial-details">
                                <h6><a href="#videoId{{$tutorial->id}}" data-toggle="modal">{{$tutorial->title}}</a></h6>
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


                <!-- Large modal Starts -->
<div class="modal fade bd-example-modal-lg" id="videoId{{$tutorial->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title">{{$tutorial->title}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
       <div class="modal__body-invoice">
       <div class="p-3">
       <iframe width="100%" height="450px" style="border-radius: 12px"
        src="{{$tutorial->link}}">
        </iframe>
       </div>
       </div>
    </div>
  </div>
</div>
<!-- Large modal Ends -->




@endforeach

@else
    <h2 class="p-2">No Tutorials are available</h2>
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

                            <form action="{{route('tutorials.store')}}" method="POST">
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
