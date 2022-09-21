@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <br>
            <div class="list-group">
              @if(Session::get('page')=="logoCopyRight")
              <?php $active="active"; ?>
              @else
              <?php $active=""; ?>
              @endif
                <a href="{{url('settings/logo-copyright')}}" class="list-group-item list-group-item-action {{$active}}" aria-current="true">
                  Logo-Copy Right Text
                </a>
                <a href="{{url('settings/social-links')}}" class="list-group-item list-group-item-action">Social Links</a>
              </div>
        </div>

        <div class="col-md-8">
            
                <form action="{{url('settings/update-logo-copyright/')}}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                    @csrf
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="copyright">"©" Copy Right Text <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="copyright" name="copyright" value="{{!empty($data['copyright'])?$data['copyright']:null}}" placeholder="Enter Copy Right Text" required=""/>
                                    </div>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Header Logo</label>
                                        <div class="input-group">
                                          <div class="custom-file">
                                            <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="header_logo" name="header_logo" value="{{ old('header_logo') }}"/>
                                          </div>
                                        </div>
                                        <div><p class="fs-6">(Recommended Image Size: WIdth:500px, Height:200px)</p></div>

                                        <div class="container mt-1 border border-5 rounded">
                                          @if(!empty($data['header_logo']))
                                        <div>
                                          <img style="width:200px; margin-top:15px; margin-bottom:5px;" src="{{asset('public/backend/images/logos/'.$data['header_logo'])}}">
                                        </div>
                                        @endif
                                        </div>
                                        
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputFile">Footer Logo</label>
                                        <div class="input-group">
                                          <div class="custom-file">
                                            <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="footer_logo" name="footer_logo" value="{{ old('footer_logo') }}"/>
                                          </div>
                                        </div>
                                        <div><p class="fs-6">(Recommended Image Size: WIdth:500px, Height:200px)</p></div>

                                        <div class="container mt-3 border border-5 rounded">
                                          @if(!empty($data['footer_logo']))
                                        <div>
                                          <img style="width:200px; margin-top:15px; margin-bottom:5px;" src="{{asset('public/backend/images/logos/'.$data['footer_logo'])}}">
                                        </div>
                                        @endif
                                        </div>
                                        
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
@endsection