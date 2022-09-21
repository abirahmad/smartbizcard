@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <br>
            <div class="list-group">
                <a href="{{url('settings/logo-copyright')}}" class="list-group-item list-group-item-action" aria-current="true">
                  Logo-Copy Right Text
                </a>
                <a href="{{url('settings/social-links')}}" class="list-group-item list-group-item-action">Social Links</a>
              </div>
        </div>
    </div>
</div>

</div>
@endsection