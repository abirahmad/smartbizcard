@extends('layouts.master')

@section('content')
<div class="content-wrapper pb-5 pt-5">
<div class="container">
    <div class="basic-card mx-3">
    <div class="row">
        <div class="col-lg-12">
            
                <form action="{{ route('settings.user.store') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="username">User Name <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{$user->username }}" placeholder="Enter Username" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="password">Password</label>
                                        <input type="text" class="form-control" id="password" name="password" value="{{old('password') }}" placeholder="Enter Password"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-actions">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
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

