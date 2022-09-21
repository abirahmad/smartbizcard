@extends('layouts.master')

@section('content')
<div class="content-wrapper pb-5">
    <div class="">
        <div class="container-fluid pt-5">
            <div class="basic-card p-3 mx-3">
                <div class="row mb-3">
                    <div class="col-lg-10 col-12">
                        <h4 class="allbizcard__head ">Invitation</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <form action="{{route('invite.store')}}" method="POST">
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
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-actions">
                                                <div class="card-body">  
                                                    <button type="submit" class="btn btn-info"> <i class="far fa-paper-plane mr-1"></i> Invite</button>
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
