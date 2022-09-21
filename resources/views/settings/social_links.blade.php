@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <br>
            <div class="list-group">
                @if(Session::get('page')=="socialLinks")
              <?php $active="active"; ?>
              @else
              <?php $active=""; ?>
              @endif
                <a href="{{url('settings/logo-copyright')}}" class="list-group-item list-group-item-action" aria-current="true">
                  Logo-Copy Right Text
                </a>
                <a href="{{url('settings/social-links')}}" class="list-group-item list-group-item-action {{$active}}">Social Links</a>
              </div>
        </div>

        <div class="col-md-8">
                <form action="{{route('social.settings')}}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                    @csrf
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="facebook_link">Facebook Page Link <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="facebook_link" name="facebook_link" placeholder="Enter Facebook Page Link"  value="{{($data['facebook_link'])?$data['facebook_link']:null}}" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="instagram_link">Instagram Page Link <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="instagram_link" name="instagram_link" placeholder="Enter Instagram Page Link"  value="{{!empty($data['instagram_link'])?$data['instagram_link']:null}}" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="twitter_link">Twitter Page Link <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="twitter_link" name="twitter_link" placeholder="Enter Twitter Page Link" value="{{!empty($data['twitter_link'])?$data['twitter_link']:null}}" required=""/>

                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
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