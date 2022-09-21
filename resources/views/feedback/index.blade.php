@extends('layouts.master')

@section('content')
<div class="content-wrapper pb-5">
    <div class="">
        <div class="container-fluid pt-5">
            <div class="basic-card p-3 mx-3">
                <div class="row mb-3">
                    <div class="col-lg-10 col-12">
                        <h4 class="allbizcard__head ">Feedback</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <form action="{{route('feedback.store')}}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="to">To <span class="required">*</span></label>
                                                <input type="email" class="form-control @error('to') is-invalid @enderror" id="to" name="to" placeholder="Enter Recipient Email" required=""/>
                                                @error('to')
                                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="subject">Subject</label>
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="description">Message</label>
                                                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="5" placeholder="Write your message"></textarea>
                                                @error('description')
                                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-actions">
                                                <div class="card-body">
                                                    <button type="submit" class="btn btn-info"> <i class="far fa-paper-plane"></i> Send</button>
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
</div>
@endsection
